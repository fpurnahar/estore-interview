<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CheckoutCart;
use App\Models\Product;
use Illuminate\Http\Request;

class WebContoller extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_prduct = Product::paginate(6);
        // dd($p_prduct);
        return view('web.welcome', compact('p_prduct'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showData = Product::where('id', $id)->first();
        // dd($showData);
        return view('web.single', compact('showData'));
    }


    public function addCart(Request $request, $id)
    {
        $cart = new CheckoutCart;
        $cart->id_user = auth()->user()->id;
        $cart->id_product = $id;
        $cart->qty = $request->qty;
        $cart->save();
        return redirect()->route('cart');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
