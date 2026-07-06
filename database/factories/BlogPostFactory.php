<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ContentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence(15),
            'content' => $this->faker->paragraphs(8, true),
            'author_id' => User::factory(),
            'status' => ContentStatus::Published,
            'published_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
