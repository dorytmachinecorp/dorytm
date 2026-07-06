<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement([
            'Drying Technology', 'Food Processing Lines', 'Cold Chain Solutions',
            'Processing Equipment', 'Packaging Solutions', 'Industrial Equipment',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(3),
            'sort_order' => $this->faker->numberBetween(1, 100),
            'status' => ContentStatus::Published,
        ];
    }
}
