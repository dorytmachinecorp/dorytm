<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public static function getUrls(): array
    {
        $urls = [
            ['loc' => route('home'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0', 'label' => 'Home', 'type' => 'main'],
            ['loc' => route('about.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8', 'label' => 'About Us', 'type' => 'main'],
            ['loc' => route('products.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '0.9', 'label' => 'All Products', 'type' => 'main'],
            ['loc' => route('industries.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => 'All Industries', 'type' => 'main'],
            ['loc' => route('blogs.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => 'Blog', 'type' => 'main'],
            ['loc' => route('contact.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'yearly', 'priority' => '0.7', 'label' => 'Contact Us', 'type' => 'main'],
            ['loc' => route('downloads.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => 'Downloads', 'type' => 'main'],
            ['loc' => route('certificates.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7', 'label' => 'Certificates', 'type' => 'main'],
            ['loc' => route('galleries.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => 'Gallery', 'type' => 'main'],
            ['loc' => route('privacy.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'yearly', 'priority' => '0.5', 'label' => 'Privacy Policy', 'type' => 'main'],
            ['loc' => route('terms.index'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'yearly', 'priority' => '0.5', 'label' => 'Terms of Service', 'type' => 'main'],
        ];

        Product::published()->get(['name', 'slug', 'updated_at'])->each(function ($product) use (&$urls) {
            $urls[] = ['loc' => route('products.show', $product->slug), 'lastmod' => $product->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $product->name, 'type' => 'product'];
        });

        Category::published()->get(['name', 'slug', 'updated_at'])->each(function ($category) use (&$urls) {
            $urls[] = ['loc' => route('categories.show', $category->slug), 'lastmod' => $category->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $category->name, 'type' => 'category'];
        });

        Industry::published()->get(['name', 'slug', 'updated_at'])->each(function ($industry) use (&$urls) {
            $urls[] = ['loc' => route('industries.show', $industry->slug), 'lastmod' => $industry->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8', 'label' => $industry->name, 'type' => 'industry'];
        });

        BlogPost::published()->get(['title', 'slug', 'updated_at'])->each(function ($post) use (&$urls) {
            $urls[] = ['loc' => route('blogs.show', $post->slug), 'lastmod' => $post->updated_at->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.7', 'label' => $post->title, 'type' => 'blog'];
        });

        return $urls;
    }

    public function index(): Response
    {
        $urls = self::getUrls();

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
        $urls = collect(self::getUrls());

        return view('pages.sitemap', compact('urls'));
    }
}
