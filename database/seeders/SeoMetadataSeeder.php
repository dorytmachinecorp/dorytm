<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeoMetadataSeeder extends Seeder
{
    public function run(): void
    {
        // Pages
        $pages = Page::all();
        foreach ($pages as $page) {
            if (! $page->seoMetadata) {
                $page->seoMetadata()->create([
                    'meta_title' => $page->title.' - Doryt Machinery',
                    'meta_description' => Str::limit(strip_tags($page->content['body'] ?? 'Explore '.$page->title.' from Doryt Machinery.'), 150),
                    'keywords' => strtolower($page->title).', doryt machinery, food processing',
                ]);
            }
        }

        // Products
        $products = Product::all();
        foreach ($products as $product) {
            if (! $product->seoMetadata) {
                $product->seoMetadata()->create([
                    'meta_title' => $product->name.' - Industrial Machinery',
                    'meta_description' => Str::limit(strip_tags($product->short_description ?? 'High performance '.$product->name.' by Doryt Machinery.'), 150),
                    'keywords' => strtolower($product->name).', industrial machinery, processing equipment',
                ]);
            }
        }

        // Industries
        $industries = Industry::all();
        foreach ($industries as $industry) {
            if (! $industry->seoMetadata) {
                $industry->seoMetadata()->create([
                    'meta_title' => $industry->name.' Solutions - Doryt Machinery',
                    'meta_description' => Str::limit(strip_tags($industry->description ?? 'Specialized machinery solutions for the '.$industry->name.' industry.'), 150),
                    'keywords' => strtolower($industry->name).' machinery, '.strtolower($industry->name).' processing',
                ]);
            }
        }

        // Categories
        $categories = Category::all();
        foreach ($categories as $category) {
            if (! $category->seoMetadata) {
                $category->seoMetadata()->create([
                    'meta_title' => $category->name.' Equipment - Doryt',
                    'meta_description' => 'Browse our selection of '.$category->name.' machinery designed for efficiency and reliability.',
                    'keywords' => strtolower($category->name).' equipment, industrial '.strtolower($category->name),
                ]);
            }
        }

        // Blog Posts
        $posts = BlogPost::all();
        foreach ($posts as $post) {
            if (! $post->seoMetadata) {
                $post->seoMetadata()->create([
                    'meta_title' => $post->title,
                    'meta_description' => Str::limit(strip_tags($post->excerpt ?? $post->content ?? ''), 150),
                    'keywords' => strtolower(str_replace('-', ' ', $post->slug)).', doryt news',
                ]);
            }
        }
    }
}
