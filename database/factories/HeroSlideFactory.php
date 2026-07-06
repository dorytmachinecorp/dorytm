<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroSlideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'subtitle' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(2),
            'image' => 'heroes/placeholder.webp',
            'cta_text' => $this->faker->randomElement(['Learn More', 'View Products', 'Contact Us', 'Get a Quote']),
            'cta_link' => $this->faker->randomElement(['/', '/products', '/contact', '/about']),
            'sort_order' => $this->faker->numberBetween(1, 5),
            'status' => ContentStatus::Published,
        ];
    }
}
