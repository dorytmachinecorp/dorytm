<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            [
                'name' => 'Fruits & Vegetables',
                'short_description' => 'Complete processing lines for washing, sorting, cutting, drying, and packaging of fresh and frozen produce.',
                'full_description' => 'From farm-fresh to packaged product, our fruit and vegetable processing lines handle washing, sorting, grading, peeling, cutting, blanching, drying, and packaging. Designed for high throughput with minimal waste, our equipment ensures consistent quality across seasonal varieties.',
                'sort_order' => 1,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Seafood',
                'short_description' => 'Specialized seafood processing equipment for grading, peeling, cooking, freezing, and packaging.',
                'full_description' => 'Our seafood processing solutions cover the complete value chain from receiving and grading to mechanical peeling, cooking, IQF freezing, glazing, and vacuum packaging. Built with corrosion-resistant materials for the demanding marine environment.',
                'sort_order' => 2,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Meat & Poultry',
                'short_description' => 'Hygienic meat and poultry processing lines for grinding, mixing, forming, cooking, and packaging.',
                'full_description' => 'Engineered for food safety and traceability, our meat and poultry equipment includes grinding, mixing, emulsifying, forming, marinating, cooking, and packaging systems. HACCP-compliant design with easy-sanitation SS-304 construction.',
                'sort_order' => 3,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Dairy',
                'short_description' => 'Drying and processing solutions for milk powder, whey protein, and dairy ingredient production.',
                'full_description' => 'Specialized drying and evaporation systems for the dairy industry including spray dryers, fluid bed dryers, and evaporators for milk powder, whey protein concentrate, casein, and other dairy ingredients. Fully CIP-able and FDA-compliant.',
                'sort_order' => 4,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Spices',
                'short_description' => 'Spice processing machinery for grinding, pulverising, drying, sifting, and blending operations.',
                'full_description' => 'Our spice processing equipment handles the entire production cycle from drying and grinding to sifting and blending. Cryogenic grinding options preserve volatile oils and aromas. Vibro sifters and ribbon blenders ensure consistent particle size and blend uniformity.',
                'sort_order' => 5,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Ready-to-Eat Foods',
                'short_description' => 'Automated production lines for RTE meals including cooking, chilling, packaging, and retort processing.',
                'full_description' => 'Complete turnkey solutions for ready-to-eat meal production including continuous cooking, blast chilling, modified atmosphere packaging (MAP), and retort sterilization. Designed for food safety, extended shelf life, and high-volume production.',
                'sort_order' => 6,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Frozen Foods',
                'short_description' => 'IQF freezing, cold storage, and frozen food processing solutions for vegetables, fruits, and prepared foods.',
                'full_description' => 'Our frozen food solutions include individual quick freezing (IQF) systems, spiral freezers, plate freezers, and complete cold storage integration. From blanching to packaging, we deliver end-to-end frozen food processing capabilities.',
                'sort_order' => 7,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Agro Processing',
                'short_description' => 'Post-harvest processing equipment for grains, pulses, oilseeds, and agricultural commodities.',
                'full_description' => 'Post-harvest processing solutions for agricultural commodities including cleaning, grading, drying, storage, and milling equipment. Our rotary drum dryers, belt dryers, and silo systems help reduce post-harvest losses and improve product quality.',
                'sort_order' => 8,
                'image' => 'ind_food_1783126196275.png',
            ],
            [
                'name' => 'Bio Fertilizers',
                'short_description' => 'Processing and drying systems for organic fertilizers, compost, and bio-based agricultural inputs.',
                'full_description' => 'Drying, granulating, and processing equipment for bio-fertilizers and organic soil amendments. Our systems handle moisture reduction, pelletizing, and packaging of compost, vermicompost, and other bio-organic products with energy-efficient designs.',
                'sort_order' => 9,
                'image' => 'ind_food_1783126196275.png',
            ],
        ];

        foreach ($industries as $ind) {
            $image = $ind['image'] ?? null;
            unset($ind['image']);

            $model = Industry::updateOrCreate(
                ['name' => $ind['name']],
                array_merge($ind, [
                    'slug' => Str::slug($ind['name']),
                    'status' => ContentStatus::Published,
                ])
            );

            if ($image && File::exists(public_path('img/'.$image))) {
                if ($model->getMedia('images')->isEmpty()) {
                    $model->addMedia(public_path('img/'.$image))
                        ->preservingOriginal()
                        ->toMediaCollection('images');
                }
            }
        }
    }
}
