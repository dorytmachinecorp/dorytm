<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Industry;
use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    private function getUrls(): array
    {
        $urls = [
            ['loc' => route('home'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0', 'label' => 'Home'],
            ['loc' => route('about.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8', 'label' => 'About Us'],
            ['loc' => route('products.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '0.9', 'label' => 'All Products'],
            ['loc' => route('industries.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => 'All Industries'],
            ['loc' => route('blogs.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => 'Blog'],
            ['loc' => route('contact.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'yearly', 'priority' => '0.7', 'label' => 'Contact Us'],
            ['loc' => route('downloads.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => 'Downloads'],
            ['loc' => route('certificates.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7', 'label' => 'Certificates'],
            ['loc' => route('galleries.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => 'Gallery'],
        ];

        Product::published()->get(['name', 'slug', 'updated_at'])->each(function ($product) use (&$urls) {
            $urls[] = ['loc' => route('products.show', $product->slug), 'lastmod' => $product->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $product->name];
        });

        Category::published()->get(['name', 'slug', 'updated_at'])->each(function ($category) use (&$urls) {
            $urls[] = ['loc' => route('categories.show', $category->slug), 'lastmod' => $category->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $category->name];
        });

        Industry::published()->get(['name', 'slug', 'updated_at'])->each(function ($industry) use (&$urls) {
            $urls[] = ['loc' => route('industries.show', $industry->slug), 'lastmod' => $industry->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $industry->name];
        });

        BlogPost::published()->get(['title', 'slug', 'updated_at'])->each(function ($post) use (&$urls) {
            $urls[] = ['loc' => route('blogs.show', $post->slug), 'lastmod' => $post->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => $post->title];
        });

        return $urls;
    }

    public function index(): Response
    {
        $urls = $this->getUrls();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>'.htmlspecialchars($url['loc']).'</loc>';
            $xml .= '<lastmod>'.$url['lastmod'].'</lastmod>';
            $xml .= '<changefreq>'.$url['changefreq'].'</changefreq>';
            $xml .= '<priority>'.$url['priority'].'</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function html()
    {
        $urls = collect($this->getUrls());
        return view('pages.sitemap', compact('urls'));
    }
}
