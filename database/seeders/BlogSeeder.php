<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        if (! $author) {
            return;
        }

        $categories = [
            'Technology',
            'Best Practices',
            'Company News',
        ];

        foreach ($categories as $cat) {
            BlogCategory::firstOrCreate(
                ['slug' => Str::slug($cat)],
                [
                    'name' => $cat,
                    'description' => $cat.' category',
                    'status' => 'published',
                ]
            );
        }

        $posts = [
            [
                'title' => 'Advances in Pharmaceutical Lyophilization',
                'slug' => Str::slug('Advances in Pharmaceutical Lyophilization'),
                'excerpt' => 'Exploring how new cascade refrigeration systems are increasing throughput for API manufacturing.',
                'content' => '<p>This is a complete technical article regarding the recent advancements in DO-RYT machinery technology. As a global leader in engineering solutions, we continuously push the boundaries of what is possible in thermal processing and material handling.</p><p>Our latest innovations include AI-driven predictive maintenance and enhanced CIP (Clean-in-Place) protocols that reduce downtime significantly between production batches.</p>',
                'published_at' => '2026-07-15 00:00:00',
                'category' => 'Technology',
            ],
            [
                'title' => 'Optimizing Food Processing Lines for Minimal Waste',
                'slug' => Str::slug('Optimizing Food Processing Lines for Minimal Waste'),
                'excerpt' => 'How continuous monitoring and precise cutting technology can reduce raw material waste by 15%.',
                'content' => '<p>This is a complete technical article regarding the recent advancements in DO-RYT machinery technology. As a global leader in engineering solutions, we continuously push the boundaries of what is possible in thermal processing and material handling.</p><p>Our latest innovations include AI-driven predictive maintenance and enhanced CIP (Clean-in-Place) protocols that reduce downtime significantly between production batches.</p>',
                'published_at' => '2026-06-28 00:00:00',
                'category' => 'Best Practices',
            ],
            [
                'title' => 'DO-RYT Installs Flagship FD-10000 in Europe',
                'slug' => Str::slug('DO-RYT Installs Flagship FD-10000 in Europe'),
                'excerpt' => 'Our engineering team successfully commissioned our largest vacuum freeze dryer yet for a major nutraceutical client.',
                'content' => '<p>This is a complete technical article regarding the recent advancements in DO-RYT machinery technology. As a global leader in engineering solutions, we continuously push the boundaries of what is possible in thermal processing and material handling.</p><p>Our latest innovations include AI-driven predictive maintenance and enhanced CIP (Clean-in-Place) protocols that reduce downtime significantly between production batches.</p>',
                'published_at' => '2026-06-10 00:00:00',
                'category' => 'Company News',
            ],
        ];

        foreach ($posts as $postData) {
            $category = BlogCategory::where('slug', Str::slug($postData['category']))->first();

            if ($category) {
                BlogPost::updateOrCreate(
                    ['slug' => $postData['slug']],
                    [
                        'title' => $postData['title'],
                        'excerpt' => $postData['excerpt'],
                        'content' => $postData['content'],
                        'published_at' => $postData['published_at'],
                        'blog_category_id' => $category->id,
                        'author_id' => $author->id,
                        'status' => 'published',
                    ]
                );
            }
        }
    }
}
