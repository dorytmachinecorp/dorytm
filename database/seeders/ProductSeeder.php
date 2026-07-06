<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $dryersCat = Category::where('name', 'Dryers & Dehydrators')->first();
        $processCat = Category::where('name', 'Process Equipment')->first();
        $coldChainCat = Category::where('name', 'Cold Chain Solutions')->first();
        $ancillaryCat = Category::where('name', 'Ancillary Equipment')->first();

        if (! $dryersCat || ! $processCat || ! $coldChainCat || ! $ancillaryCat) {
            $this->command->warn('Run CategorySeeder before ProductSeeder.');

            return;
        }

        $products = [
            // ─── Dryers & Dehydrators ───
            [
                'name' => 'Electrical Dehydrators',
                'category_id' => $dryersCat->id,
                'short_description' => 'Electric-powered dehydration systems with precise temperature control for uniform drying of fruits, vegetables, herbs, and marine products.',
                'full_description' => 'Our Electrical Dehydrators feature digitally controlled heating elements with adjustable airflow for consistent moisture removal. Constructed from food-grade stainless steel, these units are ideal for small to medium-scale dehydration operations requiring precise temperature management.',
                'features' => ['Digital Temperature Control', 'Adjustable Airflow', 'Food-Grade SS Construction', 'Energy-Efficient Heating Elements'],
                'technical_specifications' => ['Temperature Range' => '30°C – 90°C', 'Capacity' => '50 – 500 kg/batch', 'Power Supply' => '220V – 440V AC'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 1,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Heat Pump Dehydrators',
                'category_id' => $dryersCat->id,
                'short_description' => 'Energy-efficient heat pump drying technology that gently removes moisture while preserving colour, flavour, and nutritional value.',
                'full_description' => 'Leveraging advanced heat pump technology, these dehydrators achieve exceptional energy efficiency by recovering and recycling heat. Low-temperature operation preserves the natural characteristics of sensitive products, making them perfect for premium dried goods.',
                'features' => ['Low Operating Cost', 'Closed-Loop Heat Recovery', 'Gentle Low-Temp Drying', 'Preserves Colour & Nutrients'],
                'technical_specifications' => ['Temperature Range' => '20°C – 60°C', 'Capacity' => '100 – 2000 kg/batch', 'Energy Savings' => 'Up to 50% vs Electric'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 2,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Hot Air Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'High-velocity hot air drying systems designed for rapid, uniform moisture extraction from bulk materials and agricultural produce.',
                'full_description' => 'Engineered for high-throughput operations, our Hot Air Dryers utilize precisely controlled heated air circulated through multi-stage plenums. Suitable for grains, seeds, spices, and industrial raw materials requiring fast, even drying.',
                'features' => ['High-Velocity Air Circulation', 'Multi-Stage Plenum Design', 'Uniform Drying Pattern', 'Fuel Options: Diesel / Gas / Electric'],
                'technical_specifications' => ['Temperature Range' => '40°C – 120°C', 'Air Flow' => '5000 – 50000 CFM', 'Capacity' => '500 – 5000 kg/h'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 3,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Vacuum Tray Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Low-temperature vacuum drying systems for heat-sensitive pharmaceutical, chemical, and high-value food materials.',
                'full_description' => 'Vacuum Tray Dryers operate under reduced pressure to enable moisture evaporation at lower temperatures. The SS-316L trays and vacuum chamber ensure contamination-free drying of APIs, intermediates, nutraceuticals, and specialty foods.',
                'features' => ['Low-Temperature Drying', 'Vacuum Operation (<1 Pa)', 'SS-316L Trays', 'cGMP Compliant Design'],
                'technical_specifications' => ['Vacuum Level' => '< 1 Pa', 'Temperature Range' => '30°C – 85°C', 'Tray Capacity' => '24 – 288 trays'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 4,
                'image' => 'flagship_machine_1783126168912.png',
            ],
            [
                'name' => 'Rotary Drum Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Continuous rotary drum drying technology for high-volume processing of granular, powdered, and fibrous materials.',
                'full_description' => 'Our Rotary Drum Dryers utilize a rotating cylindrical drum with internal lifting flights to cascade material through a heated air stream. Ideal for fertilizers, biomass, minerals, and bulk food ingredients requiring continuous high-capacity drying.',
                'features' => ['Continuous Operation', 'Internal Lifting Flight Design', 'High Thermal Efficiency', 'Heavy-Duty Construction'],
                'technical_specifications' => ['Drum Diameter' => '1.0 – 3.5 m', 'Drum Length' => '6 – 30 m', 'Capacity' => '1 – 50 tons/h'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 5,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Continuous Belt Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Multi-stage conveyor belt drying systems offering continuous, uniform drying for extruded, formed, and sliced products.',
                'full_description' => 'Multi-zone continuous belt dryers provide precise control over temperature, humidity, and belt speed across different stages. Designed for snacks, cereals, fruits, vegetables, and industrial products requiring consistent moisture profiles.',
                'features' => ['Multi-Zone Temperature Control', 'Variable Speed Conveyor', 'Recirculating Air System', 'Modular Expandable Design'],
                'technical_specifications' => ['Belt Width' => '1.0 – 4.0 m', 'Number of Stages' => '3 – 7', 'Capacity' => '200 – 5000 kg/h'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 6,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Vacuum Freeze Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Advanced lyophilization systems for premium-quality drying of pharmaceuticals, biologics, specialty foods, and heat-sensitive materials.',
                'full_description' => 'Our Vacuum Freeze Dryers utilize sublimation technology to remove moisture from frozen products under vacuum, preserving cellular structure, flavour, and nutritional integrity. Available from pilot-scale R&D units to fully automated industrial production systems with SIP/CIP capabilities.',
                'features' => ['Sublimation Technology', 'Cascade Refrigeration (-85°C)', 'Siemens PLC / SCADA Control', 'SIP/CIP Automated (Industrial Models)'],
                'technical_specifications' => ['Shelf Area' => '0.5 – 100 m²', 'Condenser Capacity' => '10 – 1500 kg', 'Vacuum Level' => '< 1 Pa'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 7,
                'image' => 'flagship_machine_1783126168912.png',
            ],
            [
                'name' => 'Spray Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'High-speed spray drying systems for converting liquid feeds into free-flowing powders with precise particle size control.',
                'full_description' => 'Spray Dryers atomize liquid feed into fine droplets within a heated drying chamber, producing uniform spherical powders in a single continuous step. Suitable for dairy, egg, pharmaceutical, and chemical powder production.',
                'features' => ['Rotary / Nozzle Atomization', 'Precise Particle Size Control', 'Short Dwell Time', 'FDA / cGMP Compliant Options'],
                'technical_specifications' => ['Evaporation Rate' => '50 – 5000 kg/h', 'Inlet Temperature' => '150°C – 250°C', 'Outlet Temperature' => '70°C – 110°C'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 8,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Instant Quick Freezers (IQF)',
                'category_id' => $dryersCat->id,
                'short_description' => 'Individual quick freezing systems that rapidly freeze food products individually, preserving texture, moisture, and quality.',
                'full_description' => 'Our IQF freezers use ultra-low-temperature air blast or cryogenic technology to freeze individual pieces rapidly, preventing ice crystal formation and clumping. Ideal for fruits, vegetables, seafood, and ready-to-eat meals.',
                'features' => ['Individual Product Freezing', 'Ultra-Rapid Freeze Cycle', 'No Clumping / Agglomeration', 'Available in Trolley & Tunnel Configurations'],
                'technical_specifications' => ['Freezing Temperature' => '-40°C to -80°C', 'Capacity' => '100 – 5000 kg/h', 'Refrigerant' => 'Ammonia / Freon / Cryogenic'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 9,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],

            // ─── Process Equipment ───
            [
                'name' => 'Fruits & Vegetables Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete turnkey processing line for fruits and vegetables from washing and sorting to cutting, drying, and packaging.',
                'full_description' => 'A fully integrated processing line designed for high-volume fruit and vegetable operations. Includes drum washing, abrasive peeling, inspection conveyors, precision cutting, blanching, and drying modules. Built on a hygienic tubular frame with SS-304 construction.',
                'features' => ['Integrated Washing to Packaging', 'Hygienic Tubular Frame', 'Variable Speed Drives', 'Easy-Clean Design'],
                'technical_specifications' => ['Throughput' => '1 – 10 tons/h', 'Water Consumption' => 'Recycled Multi-Stage', 'Power Consumption' => '50 – 200 kW'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 10,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Papad & Chapati/Roti Making Line',
                'category_id' => $processCat->id,
                'short_description' => 'Automated production line for papad, chapati, and roti with dough preparation, sheeting, cutting, and baking/drying stations.',
                'full_description' => 'Specialized line for high-volume flatbread and papad production. Features automated dough kneading, rotary sheeting, die-cutting, and continuous baking or drying. Customizable for various thicknesses, diameters, and recipes.',
                'features' => ['Automated Dough Handling', 'Rotary Sheeting & Die-Cutting', 'Continuous Baking / Drying', 'Adjustable Thickness & Diameter'],
                'technical_specifications' => ['Production Capacity' => '1000 – 10000 pcs/h', 'Product Diameter' => '4 – 12 inches', 'Power Requirement' => '30 – 100 kW'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 11,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Egg Dehydration Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete egg breaking, pasteurizing, and dehydration system for producing egg powder and liquid egg products.',
                'full_description' => 'End-to-end egg processing line featuring automated washing, breaking, separation, pasteurization, and spray drying. Produces whole egg powder, yolk powder, and albumen powder with consistent quality and extended shelf life.',
                'features' => ['Automated Egg Breaking & Separation', 'HTST Pasteurization', 'Spray Drying for Egg Powder', 'CIP Cleaning System'],
                'technical_specifications' => ['Egg Capacity' => '10000 – 60000 eggs/h', 'Powder Output' => '100 – 1000 kg/h', 'Pasteurization' => 'HTST 66°C / 3.5 min'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 12,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Chips Making Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete potato chips and snack food production line from washing, slicing, and frying to seasoning and packaging.',
                'full_description' => 'High-capacity potato chips production line engineered for consistent quality. Features automatic destoning, steam peeling, high-speed slicing, continuous frying with oil filtration, seasoning application, and packaging integration.',
                'features' => ['Continuous Frying with Oil Filtration', 'High-Speed Rotary Slicer', 'Automated Seasoning System', 'Energy-Efficient Design'],
                'technical_specifications' => ['Production Capacity' => '50 – 500 kg/h', 'Frying Temperature' => '150°C – 190°C', 'Oil Filtration' => 'Continuous Automatic'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 13,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Meat Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Hygienic meat processing and packaging line designed for fresh, frozen, and value-added meat products.',
                'full_description' => 'Complete meat processing solution including grinding, mixing, emulsifying, forming, cooking, and packaging stations. Constructed with SS-304 materials and designed for easy sanitation, meeting international food safety standards.',
                'features' => ['Hygienic SS-304 Construction', 'Automated Grinding & Emulsifying', 'Forming & Cooking Stations', 'MAP / Vacuum Packaging Integration'],
                'technical_specifications' => ['Capacity' => '500 – 5000 kg/h', 'Cutting Temperature' => '< 4°C Controlled', 'Compliance' => 'HACCP / ISO 22000'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 14,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Shrimp/Fish Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Specialized seafood processing line for shrimp, fish, and marine products including grading, peeling, freezing, and packaging.',
                'full_description' => 'Our seafood processing line covers the entire value chain from receiving and grading to peeling, deveining, IQF freezing, and glazing. Designed for both freshwater and marine species with emphasis on yield optimization and hygiene.',
                'features' => ['Automatic Grading & Sorting', 'Mechanical Peeling & Deveining', 'IQF Freezing Integration', 'Glazing & Packaging Station'],
                'technical_specifications' => ['Processing Capacity' => '500 – 3000 kg/h', 'Freezing Temperature' => '-40°C IQF', 'Material' => 'SS-304 / Food-Grade'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 15,
                'image' => 'cat_food_processing_1783126130193.png',
            ],

            // ─── Cold Chain Solutions ───
            [
                'name' => 'Modular Cold Storage Rooms',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Customizable modular cold rooms with PUF panels for temperature-controlled storage of perishable goods.',
                'full_description' => 'Pre-engineered modular cold storage rooms constructed from high-density PUF (Polyurethane Foam) sandwiched panels. Available in any configuration with precise temperature control from +15°C to -25°C. Quick installation and expandable design.',
                'features' => ['Modular PUF Panel Construction', 'Temperature Range: +15°C to -25°C', 'Quick Installation', 'Expandable & Relocatable'],
                'technical_specifications' => ['Panel Thickness' => '75 – 150 mm', 'Temperature Range' => '+15°C to -25°C', 'Capacity' => '10 – 5000 MT'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 16,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Refrigeration Vans',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Mobile refrigeration units and reefer van bodies for temperature-controlled transport of perishable goods.',
                'full_description' => 'Custom-built refrigeration van bodies mounted on chassis of choice. Features hermetic compressor units, digital temperature controllers, and GPS-enabled temperature monitoring for cold chain integrity during transit.',
                'features' => ['Custom Van Body Fabrication', 'Hermetic Refrigeration Unit', 'Digital Temperature Control', 'GPS Temperature Monitoring'],
                'technical_specifications' => ['Van Volume' => '5 – 40 cubic meters', 'Temperature Range' => '-20°C to +15°C', 'Insulation' => 'PUF 75 – 100 mm'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 17,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Growth Chambers (Saffron, Mushroom etc.)',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Controlled environment growth chambers for commercial cultivation of saffron, mushrooms, and specialty crops.',
                'full_description' => 'Precision-controlled growth chambers with programmable temperature, humidity, lighting, and CO2 management. Designed for optimized commercial production of high-value crops requiring specific environmental conditions throughout their growth cycle.',
                'features' => ['Programmable Environment Control', 'LED Lighting with Spectrum Control', 'Humidity & CO2 Management', 'Data Logging & Remote Monitoring'],
                'technical_specifications' => ['Temperature Range' => '5°C – 40°C', 'Humidity Range' => '40% – 95% RH', 'Lighting' => 'Full-Spectrum LED'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 18,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Seed Germination Chamber',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Specialized chambers with controlled temperature and humidity for seed germination, plant breeding, and research applications.',
                'full_description' => 'Our Seed Germination Chambers provide precise environmental conditions essential for consistent germination rates and healthy seedling development. Features programmable diurnal cycles, uniform air distribution, and contamination-free interiors.',
                'features' => ['Precise Temperature Control', 'Diurnal Cycle Programming', 'Uniform Air Distribution', 'Contamination-Free Interior'],
                'technical_specifications' => ['Temperature Range' => '5°C – 50°C', 'Humidity' => '50% – 90% RH', 'Lighting' => 'Fluorescent / LED Options'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 19,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Cold Storage Units (up to 20,000 MT)',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Large-scale industrial cold storage solutions for bulk agricultural commodities, frozen foods, and cold chain logistics.',
                'full_description' => 'Industrial-scale cold storage facilities designed for capacities from 1,000 to 20,000 metric tons. Features ammonia or Freon-based refrigeration systems, automated racking integration, temperature zoning, and warehouse management system compatibility.',
                'features' => ['Ammonia / Freon Refrigeration', 'Capacity Up to 20,000 MT', 'Multi-Zone Temperature Control', 'WMS Integration Ready'],
                'technical_specifications' => ['Storage Capacity' => '1,000 – 20,000 MT', 'Temperature Range' => '-25°C to +15°C', 'Refrigeration' => 'Ammonia / Freon'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 20,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],

            // ─── Ancillary Equipment ───
            [
                'name' => 'Slicers',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Precision industrial slicers for uniform cutting of fruits, vegetables, meat, and processed food products.',
                'full_description' => 'Heavy-duty industrial slicers featuring adjustable blade speed and cutting thickness. Available in rotary, reciprocating, and centrifugal configurations for different product types and throughput requirements.',
                'features' => ['Adjustable Slice Thickness', 'Multiple Blade Configurations', 'Continuous Feed Operation', 'Easy-Cleaning Design'],
                'technical_specifications' => ['Slice Thickness' => '0.5 – 50 mm', 'Capacity' => '200 – 3000 kg/h', 'Blade Material' => 'SS-420 / Carbide'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 21,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Cold Pulverisers',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Cryogenic and ambient pulverizers for ultra-fine grinding of spices, grains, herbs, and heat-sensitive materials.',
                'full_description' => 'Advanced pulverizers that can operate at ambient or cryogenic temperatures. Liquid nitrogen injection enables grinding of heat-sensitive and high-fat materials without clogging. Achieves particle sizes down to 100 mesh and finer.',
                'features' => ['Cryogenic / Ambient Operation', 'Ultra-Fine Grinding (100+ Mesh)', 'No Heat Generation', 'Liquid Nitrogen Injection System'],
                'technical_specifications' => ['Fineness' => '100 – 300 Mesh', 'Capacity' => '25 – 500 kg/h', 'Motor Power' => '5 – 50 HP'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 22,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Cutting Machines',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Multi-purpose industrial cutting machines for dicing, shredding, and chopping of various food and non-food materials.',
                'full_description' => 'Versatile cutting machines designed for high-volume dicing, strip cutting, shredding, and granulating of vegetables, fruits, meat, and industrial materials. Interchangeable blade sets enable quick product changeovers.',
                'features' => ['Interchangeable Blade Sets', 'Dice / Strip / Shred / Chop Modes', 'Continuous High-Volume Feed', 'Safety Interlock System'],
                'technical_specifications' => ['Cut Size' => '5 – 50 mm', 'Capacity' => '300 – 5000 kg/h', 'Power' => '3 – 25 kW'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 23,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Vibro Sifter',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'High-efficiency vibratory sifting and screening equipment for powder and granular material classification.',
                'full_description' => 'Gyratory vibro sifters designed for accurate particle size separation of dry and wet materials. Features multi-deck configurations, quick-release clamping, and easy screen changes for minimal downtime between batches.',
                'features' => ['Multi-Deck Screening', 'Quick-Release Clamping', 'Easy Screen Change', 'Low Noise & Vibration'],
                'technical_specifications' => ['Screen Diameter' => '600 – 1500 mm', 'Number of Decks' => '1 – 5', 'Motor Power' => '0.5 – 3.0 kW'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 24,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Packaging Machines',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Automated packaging and sealing machinery for form-fill-seal, vacuum packaging, and weighing applications.',
                'full_description' => 'Complete range of packaging machinery including vertical and horizontal form-fill-seal machines, vacuum chambers, tray sealers, and multi-head weighers. Integrates easily with upstream processing lines for end-to-end automation.',
                'features' => ['VFFS / HFFS Configurations', 'Vacuum & MAP Packaging', 'Multi-Head Weighing Integration', 'Servo-Driven Precision'],
                'technical_specifications' => ['Packaging Speed' => '30 – 120 packs/min', 'Bag Size' => '50 – 500 mm width', 'Sealing' => 'Heat / Impulse / Vacuum'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 25,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Bleaching & Drying Equipment',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Industrial bleaching and drying systems for edible oils, grains, and food ingredient processing.',
                'full_description' => 'Custom-engineered bleaching and drying equipment for the edible oil and food processing industries. Features vacuum bleaching vessels, agitated drying chambers, and automated process control for consistent output quality.',
                'features' => ['Vacuum Bleaching Vessel', 'Agitated Drying Chamber', 'Automated Process Control', 'SS-304/316L Construction'],
                'technical_specifications' => ['Batch Capacity' => '500 – 10000 L', 'Temperature Range' => '30°C – 120°C', 'Vacuum Level' => '< 50 mbar'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 26,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Ribbon Blenders',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Heavy-duty ribbon blenders for rapid homogeneous mixing of dry powders, granules, and semi-solids.',
                'full_description' => 'High-efficiency ribbon blenders utilizing dual helical ribbons for convective and diffusive mixing action. Suitable for food ingredients, pharmaceutical powders, chemical compounds, and animal feed formulations.',
                'features' => ['Dual Helical Ribbon Agitator', 'Pneumatic / Manual Discharge', 'Liquid Spray Nozzle Option', 'Custom Volume Configurations'],
                'technical_specifications' => ['Working Volume' => '50 – 5000 L', 'Motor Power' => '2 – 50 kW', 'Material' => 'SS-304 / SS-316'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 27,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'SS-304 Work Tables & Other Equipment',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Custom-fabricated stainless steel work tables, platforms, and support equipment for hygienic processing environments.',
                'full_description' => 'Fabricated to order, our SS-304 work tables and ancillary equipment include inspection tables, packing tables, platform ladders, storage racks, and trolleys. Designed for durability and hygiene in food and pharmaceutical facilities.',
                'features' => ['Custom Fabrication to Specifications', 'SS-304 / SS-316 Construction', 'Hygienic Sanitary Design', 'Adjustable Height Options'],
                'technical_specifications' => ['Material' => 'SS-304 / SS-316', 'Surface Finish' => '180 – 400 Grit Matte', 'Load Capacity' => 'Up to 500 kg'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 28,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
        ];

        foreach ($products as $prod) {
            $image = $prod['image'];
            unset($prod['image']);

            $model = Product::updateOrCreate(
                ['name' => $prod['name']],
                array_merge($prod, [
                    'slug' => Str::slug($prod['name']),
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
