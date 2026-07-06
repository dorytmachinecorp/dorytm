<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        $products = Product::with(['media', 'category'])
            ->where('status', ContentStatus::Published)
            ->ordered()
            ->paginate(12);

        $categories = Category::ordered()->get();

        return view('pages.products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(string $slug): View
    {
        $product = Product::with(['media', 'category', 'relatedProducts'])
            ->where('slug', $slug)
            ->where('status', ContentStatus::Published)
            ->firstOrFail();

        return view('pages.products.show', compact('product'));
    }
}
