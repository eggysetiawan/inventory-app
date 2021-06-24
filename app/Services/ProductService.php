<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    private $products;

    public function createProduct($request)
    {
        $attr = $request->validated();
        $attr['slug'] = Str::slug($request->name);
        return $this->products = Product::create($attr);
    }

    public function updateProduct($request, $product)
    {
        return  $product->update($request->validated());
    }

    public function uploadImage()
    {
        $imgName = $this->products->slug . '.' . request()->file('img')->extension();
        return $this->products
            ->addMediaFromRequest('img')
            ->usingFileName($imgName)
            ->toMediaCollection('product');
    }

    public function updateImage($product)
    {
        $imgName = $product->slug . '.' . request()->file('img')->extension();
        return $product
            ->addMediaFromRequest('img')
            ->usingFileName($imgName)
            ->toMediaCollection('product');
    }
}
