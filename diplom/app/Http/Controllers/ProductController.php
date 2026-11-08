<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        if (! $product->is_active) {
            abort(404);
        }

        $related = Product::where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        return view('product', compact('product', 'related'));
    }
}