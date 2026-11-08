<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        $bestsellers = Product::where('is_active', true)
            ->where('is_bestseller', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        return view('home', compact('categories', 'bestsellers'));
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        \App\Models\Subscriber::firstOrCreate(['email' => $validated['email']]);

        return back()->with('newsletter', 'Спасибо! Вы подписаны на наши новости.');
    }
}