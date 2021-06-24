<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ProductRequest  $request
     * @param  \App\Services\ProductService; $productService
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ProductService $productService)
    {

        DB::transaction(function () use ($request, $productService) {
            $productService->createProduct($request);

            if ($request->has('img')) {
                $productService->uploadImage();
            }
        });


        session()->flash('success', __('Product has been created'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product, ProductService $productService)
    {
        DB::transaction(function () use ($request, $product, $productService) {
            $product->update($request->validated());
            if ($request->has('img')) {
                $product->media()->delete();
                $productService->updateImage($product);
            }
        });


        session()->flash('success', __('Product has been updated'));
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->media()->delete();
        $product->delete();
        session()->flash('success', __('Product has been deleted!'));
        return redirect()->route('products.index');
    }
}
