<?php

use App\Models\Download;
use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->boot();

// 1. Products Page
Page::updateOrCreate(
    ['slug' => 'products'],
    [
        'title' => 'Industrial Machinery & Food Processing Equipment',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ MACHINERY CATALOG ]',
                    'headline' => "Complete Range of \n<span class=\"text-primary-500\">Industrial Systems</span>",
                    'description' => 'Engineered for precision and scale. Explore our complete range of dryers, dehydrators, process equipment, cold chain solutions, and ancillary machinery.',
                    'background_image' => null,
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'badge' => '[ DIRECTORY ]',
                    'title' => 'All Machinery',
                    'entity_type' => 'products',
                    'limit' => 100,
                ],
            ],
            [
                'type' => 'features',
                'data' => [
                    'badge' => '[ CAPABILITIES ]',
                    'title' => 'Why Choose DO-RYT?',
                    'items' => [
                        [
                            'title' => 'SS304/316L Construction',
                            'description' => 'All contact parts are manufactured using premium stainless steel, ensuring complete compliance with global food safety and cGMP standards.',
                            'icon' => 'heroicon-o-shield-check',
                        ],
                        [
                            'title' => 'Energy Efficient',
                            'description' => 'Advanced thermal recovery systems and variable frequency drives (VFD) reduce energy consumption by up to 30% compared to traditional models.',
                            'icon' => 'heroicon-o-bolt',
                        ],
                        [
                            'title' => 'Turnkey Solutions',
                            'description' => 'From factory layout design to installation, commissioning, and operator training, we provide complete end-to-end engineering support.',
                            'icon' => 'heroicon-o-cog-6-tooth',
                        ],
                    ],
                ],
            ],
        ],
    ]
);

// 2. Industries Page
Page::updateOrCreate(
    ['slug' => 'industries'],
    [
        'title' => 'Industries Served',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ TARGET INDUSTRIES ]',
                    'headline' => 'Food Processing Solutions That Drive Growth',
                    'description' => 'We design and manufacture high-performance food processing machinery that helps businesses improve productivity, product quality, and profitability. From concept to commissioning, we deliver reliable engineering solutions tailored to your production requirements.',
                ],
            ],
            [
                'type' => 'features',
                'data' => [
                    'badge' => '[ OUR PROMISE ]',
                    'title' => 'Methodology & Rigor',
                    'items' => [
                        [
                            'title' => 'Engineered Performance',
                            'description' => 'Built with precision components and advanced automation for maximum throughput.',
                            'icon' => 'heroicon-o-cog-6-tooth',
                        ],
                        [
                            'title' => 'Built for Reliability',
                            'description' => 'Rugged SS-304/316L construction with rigorous FAT testing on every unit.',
                            'icon' => 'heroicon-o-shield-check',
                        ],
                        [
                            'title' => 'Designed Around Process',
                            'description' => 'Custom configurations tailored to your specific product and capacity needs.',
                            'icon' => 'heroicon-o-wrench-screwdriver',
                        ],
                        [
                            'title' => 'Project Support',
                            'description' => 'From factory layout and installation to commissioning and operator training.',
                            'icon' => 'heroicon-o-briefcase',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'industries',
                    'limit' => 100,
                ],
            ],
        ],
    ]
);

// 3. Certificates Page
Page::updateOrCreate(
    ['slug' => 'certificates'],
    [
        'title' => 'Quality Certifications',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ QUALITY ASSURANCE ]',
                    'headline' => 'Global Manufacturing Standards',
                    'description' => 'DO-RYT Machine Corp operates under stringent quality control protocols. Our facilities and equipment meet international standards for safety, hygiene, and performance.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'certificates',
                    'limit' => 100,
                ],
            ],
        ],
    ]
);

// 4. Galleries Page
Page::updateOrCreate(
    ['slug' => 'galleries'],
    [
        'title' => 'Media & Installations',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ MEDIA GALLERY ]',
                    'headline' => 'Machinery & Factory Installations',
                    'description' => 'Explore our manufacturing facilities, completed projects, and factory acceptance tests from around the world.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'galleries',
                    'limit' => 100,
                ],
            ],
        ],
    ]
);

// 5. Blogs Page
Page::updateOrCreate(
    ['slug' => 'blogs'],
    [
        'title' => 'Engineering Insights',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ ENGINEERING INSIGHTS ]',
                    'headline' => 'Technical Articles & Case Studies',
                    'description' => 'Deep dives into processing technology, equipment maintenance guides, and success stories from our global installations.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'blogs',
                    'limit' => 100,
                ],
            ],
        ],
    ]
);

// 6. Downloads Page
Page::updateOrCreate(
    ['slug' => 'downloads'],
    [
        'title' => 'Technical Documentation',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ DOCUMENTATION ]',
                    'headline' => 'Brochures & Technical Specs',
                    'description' => 'Download detailed product catalogs, equipment specifications, and technical data sheets for our complete machinery range.',
                ],
            ],
            [
                'type' => 'downloads',
                'data' => [
                    'title' => 'Available Documentation',
                    'download_ids' => Download::pluck('id')->toArray(),
                ],
            ],
        ],
    ]
);

// 7. Contact Page
Page::updateOrCreate(
    ['slug' => 'contact'],
    [
        'title' => 'Contact Us',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => 'System Active: Open for Inquiries',
                    'headline' => 'Contact <span class="text-primary-400">DO-RYT</span> Engineering',
                    'description' => 'Get in touch with our technical team to discuss custom machinery designs, stainless steel process engineering, or request a global service quote.',
                ],
            ],
            [
                'type' => 'contact_form',
                'data' => [
                    'title' => 'Send technical inquiry',
                    'description' => null,
                    'badge' => '[ FORM-CONTROL ]',
                ],
            ],
        ],
    ]
);

// 8. About Page
Page::updateOrCreate(
    ['slug' => 'about'],
    [
        'title' => 'About Us',
        'status' => 'published',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ CORPORATE PROFILE ]',
                    'headline' => 'Engineering Excellence <br/><span class="text-primary-500">Since 1995</span>',
                    'description' => 'DO-RYT Machine Corp is a globally recognized manufacturer of industrial dryers, food processing lines, cold chain systems, and ancillary equipment, delivering turnkey engineering solutions.',
                ],
            ],
            [
                'type' => 'about_story',
                'data' => [
                    'badge' => '[ THE LEGACY ]',
                    'title' => 'Our Legacy of Innovation',
                    'content' => '<p>For nearly three decades, DO-RYT Machine Corp has been at the forefront of industrial equipment manufacturing in India. We specialize in designing and engineering high-capacity machinery that meets stringent global standards.</p><p>Our comprehensive portfolio ranges from pilot-scale laboratory units to fully automated continuous production lines. We believe in uncompromised quality, utilizing premium 316L stainless steel and components from industry-leading partners like Siemens, Danfoss, and Schneider Electric.</p>',
                    'stat_1_value' => '500+',
                    'stat_1_label' => '[ GLOBAL INSTALLATIONS ]',
                    'stat_2_value' => '35+',
                    'stat_2_label' => '[ COUNTRIES SERVED ]',
                    'stat_3_value' => 'ISO 9001',
                    'stat_3_label' => '[ CERTIFIED FACILITY ]',
                    'stat_4_value' => '24/7',
                    'stat_4_label' => '[ GLOBAL SUPPORT ]',
                ],
            ],
            [
                'type' => 'about_facilities',
                'data' => [
                    'badge' => '[ FACILITIES ]',
                    'title' => 'State-of-the-Art Complex',
                    'description' => 'Our 100,000 sq.ft. manufacturing complex integrates advanced CNC machining, robotic welding, and automated assembly.',
                    'facilities' => [
                        [
                            'badge' => '[ UNIT_01 ]',
                            'title' => 'Precision Machining',
                            'description' => 'Utilizing 5-axis CNC centers for millimeter-perfect component manufacturing.',
                        ],
                        [
                            'badge' => '[ UNIT_02 ]',
                            'title' => 'R&D Center',
                            'description' => 'Dedicated laboratory for developing custom freeze-drying recipes and thermal profiles.',
                        ],
                        [
                            'badge' => '[ UNIT_03 ]',
                            'title' => 'Quality Assurance',
                            'description' => 'Stringent FAT (Factory Acceptance Testing) including vacuum leak and pressure vessel diagnostics.',
                        ],
                    ],
                ],
            ],
        ],
    ]
);

echo "Pages migrated successfully!\n";
