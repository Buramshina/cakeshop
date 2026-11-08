<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('sort_order')->get();
        $activeCategory = null;

        $query = Product::query()->where('is_active', true);

        if ($request->filled('category')) {
            $categorySlug = $request->get('category');

            $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
            });
        }

        if ($request->filled('min')) {
            $query->where('price', '>=', (float) $request->get('min'));
        }

        if ($request->filled('max')) {
            $query->where('price', '<=', (float) $request->get('max'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        }

       $sort = $request->get('sort', 'popular');

        switch ($sort) {
            case 'cheap':
                $products = $query->orderBy('price')->paginate(12)->withQueryString();
                break;
            case 'expensive':
                $products = $query->orderByDesc('price')->paginate(12)->withQueryString();
                break;
            case 'new':
                $products = $query->orderByDesc('created_at')->paginate(12)->withQueryString();
                break;
            default:
                $products = $query->orderBy('sort_order')->orderByDesc('id')->paginate(12)->withQueryString();
                break;
}

$products->onEachSide(1);

return view('catalog', [
    'categories' => $categories,
    'products' => $products,
    'activeCategory' => $activeCategory,
    'filters' => $request->only(['category', 'min', 'max', 'search', 'sort']),
]);
    }
}