<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        // return Product::all();
        // return response($product,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        // $product = Product::create($input);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->save();


        return response([
            'data' => $product,
            'message' => 'Product Create'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product)
            return response($product, 200);
        else
            return response(['message'=>'Product not found'],404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

         $input = $request->all();

         $product->update($input);

        return response([
            'data' => $product,
            'message' => 'Product Create'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response([
            'message' => 'Product Deleted'
        ],200);
    }
}
