<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        // Mock data for blog posts
        $posts = collect([
            (object) [
                'title' => 'Advances in Pharmaceutical Lyophilization',
                'slug' => Str::slug('Advances in Pharmaceutical Lyophilization'),
                'excerpt' => 'Exploring how new cascade refrigeration systems are increasing throughput for API manufacturing.',
                'date' => 'July 15, 2026',
                'category' => 'Technology',
                'image' => 'fac_engineering_1783126246830.png',
            ],
            (object) [
                'title' => 'Optimizing Food Processing Lines for Minimal Waste',
                'slug' => Str::slug('Optimizing Food Processing Lines for Minimal Waste'),
                'excerpt' => 'How continuous monitoring and precise cutting technology can reduce raw material waste by 15%.',
                'date' => 'June 28, 2026',
                'category' => 'Best Practices',
                'image' => 'fac_production_1783126256969.png',
            ],
            (object) [
                'title' => 'DO-RYT Installs Flagship FD-10000 in Europe',
                'slug' => Str::slug('DO-RYT Installs Flagship FD-10000 in Europe'),
                'excerpt' => 'Our engineering team successfully commissioned our largest vacuum freeze dryer yet for a major nutraceutical client.',
                'date' => 'June 10, 2026',
                'category' => 'Company News',
                'image' => 'flagship_machine_1783126168912.png',
            ],
        ]);

        return view('pages.blogs.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        // Mock single post
        $post = (object) [
            'title' => str_replace('-', ' ', Str::title($slug)),
            'content' => '<p>This is a complete technical article regarding the recent advancements in DO-RYT machinery technology. As a global leader in engineering solutions, we continuously push the boundaries of what is possible in thermal processing and material handling.</p><p>Our latest innovations include AI-driven predictive maintenance and enhanced CIP (Clean-in-Place) protocols that reduce downtime significantly between production batches.</p>',
            'date' => 'July 15, 2026',
            'category' => 'Technology',
            'image' => 'fac_engineering_1783126246830.png',
        ];

        return view('pages.blogs.show', compact('post'));
    }
}
