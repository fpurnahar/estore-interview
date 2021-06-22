<?php

use App\Http\Controllers\Auth\CheckRoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserCmsController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\WebContoller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [WebContoller::class,'index'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/check-access',[CheckRoleController::class, 'checkAccess']);

    Route::get('/cart',[CartController::class, 'index'])->name('cart');
    Route::delete('/cart-delete/{id}',[CartController::class, 'cartDelet'])->name('cart.delete');
    Route::patch('/cart-update',[CartController::class, 'cartUpdate'])->name('cart.update');

    Route::post('/add-cart/{id}',[WebContoller::class, 'addCart'])->name('add.cart');
    Route::get('/show/{id}', [WebContoller::class,'show'])->name('show.welcome');
});

Route::middleware(['auth', 'user-cms'])->group(function () {
    Route::get('/dashboard', [UserCmsController::class, 'index'])->name('user.cms');
    Route::get('/dashboard/create-product', [UserCmsController::class, 'create'])->name('user.cms.create');
    Route::post('/dashboard/store-product', [UserCmsController::class, 'store'])->name('user.cms.store');
    Route::get('/dashboard/edit-product/{id}', [UserCmsController::class, 'edit'])->name('user.cms.edit');
    Route::patch('/dashboard/update-product/{id}', [UserCmsController::class, 'update'])->name('user.cms.update');
    Route::delete('/dashboard/destroy-product/{id}', [UserCmsController::class, 'destroy'])->name('user.cms.destroy');

});
