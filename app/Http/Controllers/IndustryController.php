<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display a listing of the industries.
     */
    public function index(): View
    {
        $industries = Industry::with('media')->ordered()->get();

        return view('pages.industries.index', compact('industries'));
    }

    /**
     * Display the specified industry.
     */
    public function show(string $slug): View
    {
        $industry = Industry::with('media')
            ->where('slug', $slug)
            ->firstOrFail();

        $otherIndustries = Industry::where('id', '!=', $industry->id)->ordered()->get();

        return view('pages.industries.show', compact('industry', 'otherIndustries'));
    }
}
