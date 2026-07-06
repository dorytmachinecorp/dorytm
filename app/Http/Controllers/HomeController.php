<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with CMS data.
     */
    public function index(): View
    {
        $categories = Category::with('media')
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        $featuredProducts = Product::with(['media', 'category'])
            ->where('status', ContentStatus::Published)
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        $industries = Industry::with('media')
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        $testimonials = Testimonial::with('media')
            ->where('status', ContentStatus::Published)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact(
            'categories',
            'featuredProducts',
            'industries',
            'testimonials'
        ));
    }
}
