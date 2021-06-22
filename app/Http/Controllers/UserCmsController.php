<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserCmsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        return view('user-cms.home', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-cms.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|unique:products,nama_product',
            'harga_product' => 'required|numeric|min:3',
            'stock_product' => 'required|numeric',
            'image_product' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $product =  new Product();
        $product->nama_product = $request->nama_product;
        $product->harga_product = $request->harga_product;
        $product->stock_product = $request->stock_product;
         if ($request->hasFile('image_product')) {
            $fotoProduct = $request->image_product;
            $filename = time() . '_image_product.' . $fotoProduct->getClientOriginalExtension();
            $destinationPath = public_path().'/dist/img/product-image/';
            $fotoProduct->move($destinationPath,$filename);
            $product->image_product = '/dist/img/product-image/'. $filename;
        }
        // dd($product);
        $product->save();
        return redirect()->route('user.cms')->with('success','You Have Been Successfully Added Product Item.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Product::where('id', $id)->first();
        return view('user-cms.edit-product', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_product' => 'required|unique:products,nama_product,'.$id,
            'harga_product' => 'required|numeric|min:3',
            'stock_product' => 'required|numeric',
            'image_product' => 'mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->nama_product = $request->nama_product;
        $product->harga_product = $request->harga_product;
        $product->stock_product = $request->stock_product;
        if($request->has('image_product')){
            $oldImage = public_path().$product->image_product;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        $fotoProduct = $request->image_product;
        $filename = time() . '_image_product.' . $fotoProduct->getClientOriginalExtension();
        $destinationPath = public_path().'/dist/img/product-image/';
        $fotoProduct->move($destinationPath,$filename);
        $product->image_product = '/dist/img/product-image/'. $filename;
        }

        $product->save();
        return redirect()->route('user.cms')->with('success','You Have Been Successfully Added Product Item.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Delete Have Been Success');
    }
}
