<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

function updatePage($slug, $blocks)
{
    $page = Page::firstOrCreate(
        ['slug' => $slug],
        [
            'title' => ucfirst($slug == '/' ? 'Home' : $slug),
            'status' => 'published',
            'is_published' => true,
        ]
    );

    // Add IDs to blocks for Filament Repeater format
    $content = [];
    foreach ($blocks as $block) {
        $block['data'] = $block['data'] ?? [];
        // Filament stores repeater items with unique string IDs, we can just use uniqid()
        $content[uniqid()] = [
            'type' => $block['type'],
            'data' => $block['data'],
        ];
    }

    $page->content = $content;
    $page->save();
    echo "Updated page: $slug\n";
}

// Home Page
updatePage('/', [
    ['type' => 'home_hero'],
    ['type' => 'home_marquee'],
    ['type' => 'home_heritage'],
    ['type' => 'home_categories'],
    ['type' => 'home_flagship'],
    ['type' => 'home_process'],
    ['type' => 'home_industries'],
    ['type' => 'home_compliance_stats'],
    ['type' => 'home_gallery'],
    ['type' => 'home_testimonials'],
    ['type' => 'cta', 'data' => [
        'badge' => '[ TRANSMISSION READY ]',
        'title' => 'Ready to upgrade your capacity?',
        'description' => 'Connect directly with our lead engineers to discuss your facility\'s unique processing requirements and custom specifications.',
        'buttons' => [
            uniqid() => ['label' => 'Request Consultation', 'url' => '/contact', 'variant' => 'primary'],
            uniqid() => ['label' => 'Download Brochure', 'url' => '/downloads', 'variant' => 'outline'],
        ],
    ]],
]);

// Products Page
updatePage('products', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ MACHINERY CATALOG ]',
        'headline' => 'Complete Range of <br/><span class="text-primary-500">Industrial Systems</span>',
        'description' => 'Engineered for precision and scale. Explore our complete range of dryers, dehydrators, process equipment, cold chain solutions, and ancillary machinery.',
    ]],
    ['type' => 'directory_products'],
    ['type' => 'products_why_choose'],
]);

// Industries Page
updatePage('industries', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ TARGET FIELDS ]',
        'headline' => 'Food processing solutions built <span class="text-primary-500">around your process.</span>',
        'description' => 'Every industry has its own unique thermal and processing requirements. DO-RYT systems are highly customizable to meet the exacting standards of various sectors.',
    ]],
    ['type' => 'industries_promise'],
    ['type' => 'directory_industries'],
    ['type' => 'cta', 'data' => [
        'badge' => '[ TRANSMISSION READY ]',
        'title' => 'Need a custom solution?',
        'description' => 'Our engineering team specializes in modifying and building systems from the ground up to meet highly specific requirements.',
        'buttons' => [
            uniqid() => ['label' => 'Contact Engineering', 'url' => '/contact', 'variant' => 'primary'],
        ],
    ]],
]);

// Downloads Page
updatePage('downloads', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ DOCUMENTATION ]',
        'headline' => 'Technical Specs & <span class="text-primary-500">Brochures</span>',
        'description' => 'Access detailed technical specifications, operational manuals, and compliance documentation for all DO-RYT machinery.',
    ]],
    ['type' => 'directory_downloads'],
]);

// Galleries Page
updatePage('galleries', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ MEDIA ]',
        'headline' => 'Machine & Facility <span class="text-primary-500">Galleries</span>',
        'description' => 'Explore high-resolution imagery of our manufacturing facilities, machinery details, and successful global installations.',
    ]],
    ['type' => 'directory_galleries'],
]);

// Certificates Page
updatePage('certificates', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ CERTIFICATIONS ]',
        'headline' => 'Global Compliance <span class="text-primary-500">Standards</span>',
        'description' => 'DO-RYT machinery is designed, manufactured, and validated to meet the most rigorous international compliance standards including CE, ISO, and cGMP.',
    ]],
    ['type' => 'directory_certificates'],
]);

// Blogs Page
updatePage('blogs', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ ARTICLES ]',
        'headline' => 'Industry News & <span class="text-primary-500">Insights</span>',
        'description' => 'The latest updates on thermal processing technology, company news, and global exhibitions from the DO-RYT team.',
    ]],
    ['type' => 'directory_blogs'],
]);

// About Page
updatePage('about', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ CORPORATE PROFILE ]',
        'headline' => 'The Architects of <span class="text-primary-500">Industrial Processing.</span>',
        'description' => 'For over two decades, DO-RYT Machine Corp has been at the forefront of thermal processing and food engineering, delivering turnkey solutions to the world\'s most demanding manufacturers.',
    ]],
    ['type' => 'about_story_original'],
    ['type' => 'about_facilities_original'],
]);

// Contact Page
updatePage('contact', [
    ['type' => 'hero', 'data' => [
        'size' => 'standard',
        'badge' => '[ SECURE COMMS ]',
        'headline' => 'Initiate <span class="text-primary-500">Transmission.</span>',
        'description' => 'Connect directly with our engineering division, request a quote, or schedule a facility tour. Our global support network operates 24/7.',
    ]],
    ['type' => 'contact_section'],
]);

echo "All pages migrated successfully.\n";
