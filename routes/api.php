<?php

use App\Http\Controllers\Auth\CheckRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->post('/addcart', [CheckoutController::class, 'addCart'])->name('api.addCart');
Route::post('/updatecart', [CheckoutController::class, 'updateCart'])->name('api.updateCart');

