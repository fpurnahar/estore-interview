<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\CheckoutCart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $cartItems = CheckoutCart::where('id_user', auth()->user()->id)->where('status_checkout', 'tidak')->get();
       return view('web.cart', compact('cartItems'));
    }

    public function cartDelet($id)
    {
        CheckoutCart::destroy($id);
        return back()->with('success', 'Delete Success');
    }

    public function cartUpdate(Request $request)
    {
        $ids = $request->id_product;
        foreach ($ids as $key => $value) {
            $update = CheckoutCart::findOrFail($value);
            $update->status_checkout = 'ya';
            $update->save();

            $product = Product::findOrFail($update->id_product);
            $product->stock_product = $product->stock_product - $update->qty;
            $product->save();
        }

        return back()->with('success', 'Success Check Out');
    }

}
