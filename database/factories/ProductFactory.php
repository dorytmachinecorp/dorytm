<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ContentStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = ucwords($this->faker->words(3, true));

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $this->faker->sentence(10),
            'long_description' => $this->faker->paragraphs(5, true),
            'applications' => $this->faker->paragraph(2),
            'features' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ],
            'specifications' => [
                'Capacity' => '500 Kg/Batch',
                'Power' => '15 kW',
                'Voltage' => '415V',
                'Material' => 'SS 316',
            ],
            'capacity' => $this->faker->randomElement(['100 Kg', '250 Kg', '500 Kg', '1000 Kg']),
            'power' => $this->faker->randomElement(['5 kW', '10 kW', '15 kW', '25 kW']),
            'voltage' => '415V / 3 Phase',
            'material' => $this->faker->randomElement(['SS 304', 'SS 316', 'MS with SS 304 Contact Parts']),
            'is_featured' => $this->faker->boolean(30),
            'sort_order' => $this->faker->numberBetween(1, 100),
            'status' => ContentStatus::Published,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
