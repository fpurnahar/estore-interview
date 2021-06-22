<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckoutCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function addCart(Request $request)
    {
        try {
            $cart = new CheckoutCart;
            $cart->id_user = auth()->user()->id;
            $cart->id_product = $request->id_product;
            $cart->qty = $request->qty;
            $cart->save();
        return response()->json([
            'msg' => 'success',
            'data' => $cart,
        ], 200);
        } catch (\Throwable $th) {
           return response()->json([
               'msg' => $th
           ], 500);
        }
    }

    public function updateCart(Request $request)
    {
        $cart = CheckoutCart::findOrFail($request->id);
        $cart->qty = $request->qty;
        $cart->save();
    }
}
