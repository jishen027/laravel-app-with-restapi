<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // return Product::all();
        // return response()->json("all data from laravel backend");
        $products = Product::all()->sortBy('id');
        return $products;
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
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Product::find($id);
        $product = Product::findOrfail($id);
        return $product;
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
        $product = Product::find($id);
        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // delete product method 1
        // Product::destroy($id);

        // delete product method 2
        $product = Product::find($id);
        $product->delete();

        return $product;
    }

    public function softDelete($id){
        $product = Product::find($id);
        $product->delete();
        return $product;
    }

    // read soft deleted products
    public function readSoftDeletedProducts(){
        $products = Product::onlyTrashed()->get();
        return $products;
    }

    // restore soft deleted products
    public function restoreSoftDeletedProduct($id){
        $product = Product::onlyTrashed()->where('id', $id)->restore();
        return $product;
    }
}
