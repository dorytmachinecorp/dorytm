<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Marcus Chen',
                'designation' => 'VP of Manufacturing',
                'company' => 'NovaPharma Global',
                'content' => 'DO-RYT\'s continuous freeze drying systems have revolutionized our biological API production. The precision control and absolute reliability under 24/7 load are simply unmatched in the industry.',
                'rating' => 5,
                'status' => ContentStatus::Published,
                'image' => 'avatar_marcus_1783126276782.png',
            ],
            [
                'client_name' => 'Sarah Jenkins',
                'designation' => 'Operations Director',
                'company' => 'FreshHarvest Foods',
                'content' => 'After integrating the automated vegetable processing line, our throughput increased by 40% while significantly reducing waste. The robust stainless steel construction exceeds all FDA hygiene requirements.',
                'rating' => 5,
                'status' => ContentStatus::Published,
                'image' => null,
            ],
            [
                'client_name' => 'Dr. Robert Muller',
                'designation' => 'Lead Process Engineer',
                'company' => 'ChemCorp Industries',
                'content' => 'The custom ribbon blenders provided by DO-RYT handle our highly corrosive materials with zero degradation. Their engineering team understood our complex requirements from day one.',
                'rating' => 5,
                'status' => ContentStatus::Published,
                'image' => null,
            ],
        ];

        foreach ($testimonials as $test) {
            $image = $test['image'];
            unset($test['image']);

            $model = Testimonial::updateOrCreate(
                ['client_name' => $test['client_name']],
                $test
            );

            if ($image && File::exists(public_path('img/'.$image))) {
                if ($model->getMedia('avatars')->isEmpty()) {
                    $model->addMedia(public_path('img/'.$image))
                        ->preservingOriginal()
                        ->toMediaCollection('avatars');
                }
            }
        }
    }
}
