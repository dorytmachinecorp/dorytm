<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display the specified category and its products.
     */
    public function show(string $slug): View
    {
        $category = Category::with(['media', 'products' => function ($query) {
            $query->where('status', ContentStatus::Published)->ordered();
        }, 'products.media'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Also fetch sibling categories for a sidebar navigation
        $categories = Category::ordered()->get();

        return view('pages.categories.show', compact('category', 'categories'));
    }
}
