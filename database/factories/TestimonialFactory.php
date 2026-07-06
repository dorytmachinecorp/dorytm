<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'client_name' => $this->faker->name(),
            'company' => $this->faker->company(),
            'designation' => $this->faker->jobTitle(),
            'content' => $this->faker->paragraph(3),
            'rating' => $this->faker->numberBetween(4, 5),
            'sort_order' => $this->faker->numberBetween(1, 20),
            'status' => ContentStatus::Published,
        ];
    }
}
