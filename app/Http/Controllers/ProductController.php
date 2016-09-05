<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ProductRequest;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => 'Item successfully deleted'], 200);
    }

    /**
     * Return product stock
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function stock(Product $product)
    {
        switch ($product->stock) {
            case 1:
                $message = 'Direct leverbaar';
                break;
            case 2:
                $message = 'Binnen 5 werkdagen';
                break;

            default:
                $message = 'Niet op voorraad';
                break;
        }
        return response()->json(['stock' => $message], 200);
    }
}
