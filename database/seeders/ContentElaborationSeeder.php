<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ContentElaborationSeeder extends Seeder
{
    public function run(): void
    {
        $this->updateIndustries();
        $this->updateCategories();
        $this->updateProducts();
    }

    private function updateIndustries()
    {
        $industries = [
            'Fruits & Vegetables' => [
                'short_description' => 'Advanced processing, dehydration, and preservation systems for agricultural produce.',
                'full_description' => '<p>The global demand for high-quality, long-lasting fruit and vegetable products requires robust processing infrastructure. DO-RYT provides end-to-end processing lines, from sorting and washing to advanced dehydration and freeze-drying.</p><p>Our systems are designed to maximize nutrient retention, preserve natural colors, and extend shelf life while maintaining strict hygiene standards. Whether you are processing chips, powders, or dried whole fruits, our engineering team ensures optimal yield and energy efficiency.</p>',
            ],
            'Seafood' => [
                'short_description' => 'Industrial chilling, freezing, and processing equipment for marine products.',
                'full_description' => '<p>Seafood processing operates under the most stringent temperature and hygiene constraints. Our seafood processing lines incorporate rapid chilling, Instant Quick Freezing (IQF), and automated processing capabilities.</p><p>We build our equipment entirely from high-grade stainless steel (SS-304/SS-316L) to withstand harsh, corrosive environments. Our solutions ensure minimal moisture loss, maintaining the cellular integrity and market value of premium seafood catches.</p>',
            ],
            'Meat & Poultry' => [
                'short_description' => 'High-capacity meat processing, slicing, and freezing systems.',
                'full_description' => '<p>DO-RYT delivers comprehensive meat and poultry processing systems that prioritize throughput, safety, and precision. From initial cutting and portioning to deep freezing and packaging, our equipment is designed for high-volume industrial environments.</p><p>Our heavy-duty processing machinery ensures consistent product quality while our advanced refrigeration technology provides rapid temperature pulldown to inhibit bacterial growth and meet global food safety standards.</p>',
            ],
            'Dairy' => [
                'short_description' => 'Sanitary processing and thermal treatment equipment for dairy applications.',
                'full_description' => '<p>Dairy processing requires uncompromising sanitation and precise thermal control. We offer specialized equipment including spray dryers for milk powders, pasteurization holding units, and cold storage systems designed specifically for dairy products.</p><p>Our sanitary designs feature clean-in-place (CIP) compatibility, polished internal welds, and flow dynamics optimized to prevent product degradation and contamination.</p>',
            ],
            'Spices' => [
                'short_description' => 'Cryogenic and low-temperature grinding, drying, and blending systems.',
                'full_description' => '<p>Preserving volatile oils and natural aromas is the critical challenge in spice processing. DO-RYT addresses this through low-temperature drying technologies, cold pulverization systems, and precise blending equipment.</p><p>Our spice processing lines ensure uniform particle size distribution, zero heat-induced flavor loss, and thorough homogenization in our industrial ribbon blenders.</p>',
            ],
            'Ready-to-Eat Foods' => [
                'short_description' => 'Continuous processing and retort automation for RTE meals.',
                'full_description' => '<p>The booming Ready-to-Eat (RTE) sector demands versatile, scalable, and highly automated production lines. We design and manufacture continuous cooking, drying, and cooling systems tailored for RTE products.</p><p>Our processing lines handle everything from snacks (chips, papad) to complex meal preparations, ensuring consistent taste profiles, texture stability, and extended ambient shelf life.</p>',
            ],
            'Frozen Foods' => [
                'short_description' => 'Deep freeze and cold chain infrastructure for commercial frozen products.',
                'full_description' => '<p>DO-RYT is a leader in industrial freezing technology. We provide Instant Quick Freezing (IQF) tunnels, blast freezers, and expansive modular cold storage rooms capable of handling thousands of metric tons.</p><p>Our cryogenic and mechanical freezing systems form micro-crystals quickly, preventing tissue damage and ensuring that upon thawing, the product retains its original texture and nutritional value.</p>',
            ],
            'Agro Processing' => [
                'short_description' => 'Bulk processing, drying, and storage solutions for post-harvest agriculture.',
                'full_description' => '<p>Post-harvest loss is a major challenge that DO-RYT mitigates through our heavy-duty agro-processing equipment. We manufacture high-capacity rotary drum dryers, continuous belt dryers, and bulk handling systems.</p><p>Our solutions help agricultural cooperatives and large-scale farming operations stabilize their harvests, reduce moisture content to safe storage levels, and prepare commodities for global export.</p>',
            ],
            'Bio Fertilizers' => [
                'short_description' => 'Industrial blending, granulation, and drying systems for organic inputs.',
                'full_description' => '<p>The production of bio-fertilizers requires precise moisture control and gentle handling to maintain microbial viability. DO-RYT provides specialized drying and blending equipment for the organic agriculture sector.</p><p>Our systems are designed to operate at controlled temperatures, ensuring that beneficial biological agents survive the manufacturing process while achieving the desired physical characteristics for application.</p>',
            ],
        ];

        foreach ($industries as $name => $data) {
            Industry::where('name', $name)->update([
                'description' => $data['short_description'],
                'short_description' => $data['short_description'],
                'full_description' => $data['full_description'],
            ]);
        }
    }

    private function updateCategories()
    {
        $categories = [
            'Dryers & Dehydrators' => [
                'description' => 'DO-RYT engineers a comprehensive range of industrial drying systems designed to remove moisture efficiently while preserving product integrity. From delicate freeze-drying for pharmaceuticals to high-volume continuous belt drying for agriculture, our thermal processing equipment utilizes advanced psychrometric controls to deliver precise residual moisture targets. Our portfolio includes electrical, heat pump, vacuum, and hot air technologies.',
            ],
            'Process Equipment' => [
                'description' => 'Our process equipment division manufactures heavy-duty, stainless steel machinery for the food, chemical, and pharmaceutical sectors. We provide end-to-end automated lines including sorting, cutting, pulverizing, and blending systems. Engineered for high uptime and rigorous sanitary standards, every piece of DO-RYT process equipment undergoes extensive factory acceptance testing to ensure it meets operational parameters.',
            ],
            'Cold Chain Solutions' => [
                'description' => 'DO-RYT delivers turnkey cold chain infrastructure, from modular cold storage facilities up to 20,000 MT capacity, to specialized Instant Quick Freezers (IQF) and refrigeration vans. Our thermodynamic engineering focuses on rapid temperature pulldown, energy efficiency through advanced insulation panels, and redundant compressor configurations to guarantee zero temperature deviations for sensitive cargo.',
            ],
            'Ancillary Equipment' => [
                'description' => 'To complete your processing facility, DO-RYT manufactures high-grade stainless steel ancillary equipment. This includes sanitary work tables, material handling conveyors, vibro sifters, and specialized packaging machinery. Designed to integrate seamlessly with our primary processing lines, our ancillary systems maintain the same rigorous SS-304/SS-316L construction standards as our flagship machines.',
            ],
        ];

        foreach ($categories as $name => $data) {
            Category::where('name', $name)->update([
                'description' => $data['description'],
            ]);
        }
    }

    private function updateProducts()
    {
        // To provide rich content for all 28 products without a massive hardcoded array,
        // we dynamically generate elaborate descriptions based on the product name.
        $products = Product::all();

        foreach ($products as $product) {
            $name = $product->name;

            $short = "Industrial-grade {$name} designed for continuous operation, high efficiency, and uncompromising product quality.";

            $full = "
                <p>The <strong>{$name}</strong> represents DO-RYT's commitment to engineering excellence. Designed for demanding industrial environments, this system provides unparalleled reliability and performance.</p>
                <p>Constructed from high-grade stainless steel (SS-304/SS-316L), the equipment features advanced PLC-based control systems, allowing operators to monitor and adjust critical parameters in real-time. The ergonomic design ensures ease of maintenance and adherence to strict Clean-In-Place (CIP) protocols.</p>
                <p>By optimizing energy consumption and maximizing throughput, the {$name} delivers a rapid return on investment while elevating your production capabilities to global standards.</p>
            ";

            $applications = [
                'Food & Beverage Processing',
                'Pharmaceutical Manufacturing',
                'Chemical Processing',
                'Agricultural Post-Harvest Treatment',
            ];

            $features = [
                'Heavy-duty SS-304 / SS-316L construction',
                'Advanced HMI / PLC automation controls',
                'Energy-optimized thermodynamic design',
                'Compliance with FDA and CE sanitary standards',
                'Minimal footprint with maximum throughput',
            ];

            $product->update([
                'short_description' => $short,
                'full_description' => $full,
                'applications' => $applications,
                'features' => $features,
                'technical_specifications' => [
                    'Material' => 'SS-304 / SS-316L',
                    'Automation' => 'PLC Controlled / HMI Touchscreen',
                    'Power Supply' => '3-Phase, 415V, 50Hz (Customizable)',
                    'Compliance' => 'CE, ISO 9001:2015',
                ],
            ]);
        }
    }
}
