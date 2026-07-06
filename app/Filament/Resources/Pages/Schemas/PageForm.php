<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Filament\Schemas\SeoSchema;
use App\Models\Download;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Page Info')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set(
                                        'slug',
                                        Str::slug($state ?? ''),
                                    )),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),

                        Section::make('Page Builder')
                            ->schema([
                                Builder::make('content')
                                    ->blocks([
                                        Builder\Block::make('hero')
                                            ->label('Hero Section')
                                            ->icon('heroicon-m-photo')
                                            ->schema([
                                                Select::make('size')
                                                    ->options([
                                                        'large' => 'Large (Home Page)',
                                                        'standard' => 'Standard (Inner Pages)',
                                                    ])
                                                    ->default('standard')
                                                    ->required(),
                                                TextInput::make('badge')->label('Small Badge Text (e.g. [ TRANSMISSION READY ])'),
                                                TextInput::make('headline')->required(),
                                                Textarea::make('description'),
                                                FileUpload::make('background_image')->image()->directory('page-builder'),
                                                Repeater::make('buttons')
                                                    ->schema([
                                                        TextInput::make('label')->required(),
                                                        TextInput::make('url')->required(),
                                                        Select::make('variant')
                                                            ->options([
                                                                'primary' => 'Primary',
                                                                'outline' => 'Outline',
                                                            ])->default('primary'),
                                                    ])->columns(3),
                                            ]),

                                        Builder\Block::make('content')
                                            ->label('Rich Text Content')
                                            ->icon('heroicon-m-document-text')
                                            ->schema([
                                                RichEditor::make('body')->required(),
                                            ]),

                                        Builder\Block::make('features')
                                            ->label('Features Grid')
                                            ->icon('heroicon-m-squares-2x2')
                                            ->schema([
                                                TextInput::make('badge'),
                                                TextInput::make('title')->required(),
                                                Textarea::make('description'),
                                                Repeater::make('items')
                                                    ->schema([
                                                        TextInput::make('icon')->label('Heroicon Name (e.g. cpu-chip)'),
                                                        TextInput::make('title')->required(),
                                                        Textarea::make('description')->required(),
                                                    ]),
                                            ]),

                                        Builder\Block::make('stats')
                                            ->label('Statistics')
                                            ->icon('heroicon-m-chart-bar')
                                            ->schema([
                                                TextInput::make('title'),
                                                Textarea::make('description'),
                                                Repeater::make('items')
                                                    ->schema([
                                                        TextInput::make('value')->required(),
                                                        TextInput::make('label')->required(),
                                                    ])->columns(2),
                                            ]),

                                        Builder\Block::make('cta')
                                            ->label('Call to Action')
                                            ->icon('heroicon-m-megaphone')
                                            ->schema([
                                                TextInput::make('badge'),
                                                TextInput::make('title')->required(),
                                                Textarea::make('description'),
                                                Repeater::make('buttons')
                                                    ->schema([
                                                        TextInput::make('label')->required(),
                                                        TextInput::make('url')->required(),
                                                        Select::make('variant')
                                                            ->options([
                                                                'primary' => 'Primary',
                                                                'outline' => 'Outline',
                                                            ])->default('primary'),
                                                    ])->columns(3),
                                            ]),

                                        Builder\Block::make('gallery')
                                            ->label('Image Gallery')
                                            ->icon('heroicon-m-photo')
                                            ->schema([
                                                TextInput::make('title'),
                                                Repeater::make('images')
                                                    ->schema([
                                                        FileUpload::make('image')->image()->required()->directory('page-builder'),
                                                        TextInput::make('caption'),
                                                    ]),
                                            ]),

                                        Builder\Block::make('downloads')
                                            ->label('Downloads Selection')
                                            ->icon('heroicon-m-arrow-down-tray')
                                            ->schema([
                                                TextInput::make('title')->default('Related Downloads'),
                                                Textarea::make('description'),
                                                Select::make('download_ids')
                                                    ->multiple()
                                                    ->options(Download::pluck('title', 'id'))
                                                    ->searchable()
                                                    ->preload(),
                                            ]),

                                        Builder\Block::make('contact_form')
                                            ->label('Contact Form & Info')
                                            ->icon('heroicon-m-envelope')
                                            ->schema([
                                                TextInput::make('title')->default('Send technical inquiry'),
                                                Textarea::make('description')->default('Get in touch with our technical team to discuss custom machinery designs.'),
                                                TextInput::make('badge')->default('[ FORM-CONTROL ]'),
                                            ]),

                                        Builder\Block::make('about_story')
                                            ->label('About - Company Story')
                                            ->icon('heroicon-m-book-open')
                                            ->schema([
                                                TextInput::make('badge')->default('[ THE LEGACY ]'),
                                                TextInput::make('title')->default('Our Legacy of Innovation'),
                                                RichEditor::make('content'),
                                                FileUpload::make('image')->image()->directory('page-builder'),
                                                Grid::make(4)->schema([
                                                    TextInput::make('stat_1_value')->label('Stat 1 Value'),
                                                    TextInput::make('stat_1_label')->label('Stat 1 Label'),
                                                    TextInput::make('stat_2_value')->label('Stat 2 Value'),
                                                    TextInput::make('stat_2_label')->label('Stat 2 Label'),
                                                    TextInput::make('stat_3_value')->label('Stat 3 Value'),
                                                    TextInput::make('stat_3_label')->label('Stat 3 Label'),
                                                    TextInput::make('stat_4_value')->label('Stat 4 Value'),
                                                    TextInput::make('stat_4_label')->label('Stat 4 Label'),
                                                ]),
                                            ]),

                                        Builder\Block::make('about_facilities')
                                            ->label('About - Facilities')
                                            ->icon('heroicon-m-building-office-2')
                                            ->schema([
                                                TextInput::make('badge')->default('[ FACILITIES ]'),
                                                TextInput::make('title')->default('State-of-the-Art Complex'),
                                                Textarea::make('description'),
                                                Repeater::make('facilities')
                                                    ->schema([
                                                        TextInput::make('badge')->label('Unit ID (e.g. [ UNIT_01 ])'),
                                                        TextInput::make('title'),
                                                        Textarea::make('description'),
                                                        FileUpload::make('image')->image()->directory('page-builder'),
                                                    ])->columns(2),
                                            ]),

                                        Builder\Block::make('entity_list')
                                            ->label('Entity List')
                                            ->icon('heroicon-m-rectangle-group')
                                            ->schema([
                                                TextInput::make('badge'),
                                                TextInput::make('title'),
                                                Textarea::make('description'),
                                                Select::make('entity_type')
                                                    ->options([
                                                        'products' => 'Products',
                                                        'industries' => 'Industries',
                                                        'categories' => 'Product Categories',
                                                        'galleries' => 'Galleries',
                                                        'blogs' => 'Blog Posts',
                                                        'certificates' => 'Certificates',
                                                    ])->required(),
                                                TextInput::make('limit')->numeric()->default(100)->label('Number of items to show'),
                                            ]),
                                        Builder\Block::make('home_hero')
                                            ->label('Home - Hero Slider')
                                            ->icon('heroicon-m-play')
                                            ->schema([
                                                TextInput::make('note')->default('Slides are managed in the Hero Slides menu. This block just positions the slider.')->disabled(),
                                            ]),

                                        Builder\Block::make('home_marquee')
                                            ->label('Home - Trusted Marquee')
                                            ->icon('heroicon-m-code-bracket-square')
                                            ->schema([
                                                TextInput::make('badge')->default('[ ENGINEERED FOR THE WORLD\'S MOST DEMANDING FACTORY FLOORS ]'),
                                                TextInput::make('items')->label('Items (comma separated)')->default('// SIEMENS, // BAYER GLOBAL, // NESTLÉ, // DANONE NUTRITION, // UNILEVER, // PFIZER PHARMA'),
                                            ]),

                                        Builder\Block::make('home_heritage')
                                            ->label('Home - Heritage')
                                            ->icon('heroicon-m-clock')
                                            ->schema([
                                                TextInput::make('badge')->default('[ TWO DECADES OF INNOVATION ]'),
                                                TextInput::make('title')->default('We don\'t just build machines. We architect production ecosystems.'),
                                                Textarea::make('description'),
                                            ]),

                                        Builder\Block::make('home_categories')
                                            ->label('Home - Categories')
                                            ->icon('heroicon-m-rectangle-group')
                                            ->schema([
                                                TextInput::make('badge')->default('[ CORE SYSTEMS ]'),
                                                TextInput::make('title')->default('Systems engineered for absolute operational dominance.'),
                                            ]),

                                        Builder\Block::make('home_flagship')
                                            ->label('Home - Flagship Product')
                                            ->icon('heroicon-m-star')
                                            ->schema([
                                                TextInput::make('badge')->default('[ FLAGSHIP MODEL ]'),
                                            ]),

                                        Builder\Block::make('home_process')
                                            ->label('Home - Manufacturing Process')
                                            ->icon('heroicon-m-cog-8-tooth')
                                            ->schema([
                                                TextInput::make('badge')->default('[ OPERATIONAL PIPELINE ]'),
                                                TextInput::make('title')->default('Quality control from raw steel to commissioning.'),
                                            ]),

                                        Builder\Block::make('home_industries')
                                            ->label('Home - Industries Served')
                                            ->icon('heroicon-m-building-office')
                                            ->schema([
                                                TextInput::make('badge')->default('[ TARGET FIELDS ]'),
                                                TextInput::make('title')->default('Food processing solutions built around your process.'),
                                            ]),

                                        Builder\Block::make('home_compliance_stats')
                                            ->label('Home - Compliance & Stats')
                                            ->icon('heroicon-m-check-badge')
                                            ->schema([
                                                TextInput::make('badge')->default('[ COMPLIANCE INDEX ]'),
                                                TextInput::make('title')->default('Engineered to global compliance standards.'),
                                                Textarea::make('description'),
                                            ]),

                                        Builder\Block::make('home_gallery')
                                            ->label('Home - Factory Gallery')
                                            ->icon('heroicon-m-photo')
                                            ->schema([
                                                TextInput::make('badge')->default('[ SYSTEM CONSOLE ]'),
                                                TextInput::make('title')->default('State-of-the-art facilities driving global innovation.'),
                                            ]),

                                        Builder\Block::make('home_testimonials')
                                            ->label('Home - Testimonials')
                                            ->icon('heroicon-m-chat-bubble-bottom-center-text')
                                            ->schema([
                                                TextInput::make('badge')->default('[ TESTIMONIAL LOGS ]'),
                                                TextInput::make('title')->default('Trusted by Chief Engineers worldwide.'),
                                                TextInput::make('subtitle')->default('Hear from the plant managers and operations directors who rely on our machinery every day.'),
                                            ]),

                                        // Directory Blocks
                                        Builder\Block::make('directory_products')
                                            ->label('Directory - Products')
                                            ->icon('heroicon-m-squares-2x2')
                                            ->schema([
                                                TextInput::make('badge')->default('[ DIRECTORY ]'),
                                                TextInput::make('title')->default('All Machinery'),
                                            ]),

                                        Builder\Block::make('directory_industries')
                                            ->label('Directory - Industries')
                                            ->icon('heroicon-m-building-office')
                                            ->schema([
                                                TextInput::make('badge')->default('[ DIRECTORY ]'),
                                                TextInput::make('title')->default('All Industries'),
                                            ]),

                                        Builder\Block::make('directory_downloads')
                                            ->label('Directory - Downloads')
                                            ->icon('heroicon-m-arrow-down-tray')
                                            ->schema([
                                                TextInput::make('badge')->default('[ DOCUMENTATION ]'),
                                                TextInput::make('title')->default('Technical Specifications & Brochures'),
                                            ]),

                                        Builder\Block::make('directory_galleries')
                                            ->label('Directory - Galleries')
                                            ->icon('heroicon-m-photo')
                                            ->schema([
                                                TextInput::make('badge')->default('[ MEDIA ]'),
                                                TextInput::make('title')->default('Machine & Facility Galleries'),
                                            ]),

                                        Builder\Block::make('directory_certificates')
                                            ->label('Directory - Certificates')
                                            ->icon('heroicon-m-check-badge')
                                            ->schema([
                                                TextInput::make('badge')->default('[ CERTIFICATIONS ]'),
                                                TextInput::make('title')->default('Global Compliance Standard'),
                                            ]),

                                        Builder\Block::make('directory_blogs')
                                            ->label('Directory - Blogs')
                                            ->icon('heroicon-m-newspaper')
                                            ->schema([
                                                TextInput::make('badge')->default('[ ARTICLES ]'),
                                                TextInput::make('title')->default('Industry News & Insights'),
                                            ]),

                                        Builder\Block::make('products_why_choose')
                                            ->label('Products - Why Choose')
                                            ->icon('heroicon-m-light-bulb')
                                            ->schema([
                                                TextInput::make('badge')->default('[ CAPABILITIES ]'),
                                                TextInput::make('title')->default('Why Choose DO-RYT?'),
                                                Repeater::make('features')
                                                    ->schema([
                                                        TextInput::make('number')->default('01')->required(),
                                                        TextInput::make('title')->required(),
                                                        Textarea::make('description')->required(),
                                                    ])->default([
                                                        ['number' => '01', 'title' => 'SS304/316L Construction', 'description' => 'All contact parts are manufactured using premium stainless steel, ensuring complete compliance with global food safety and cGMP standards.'],
                                                        ['number' => '02', 'title' => 'Energy Efficient', 'description' => 'Advanced thermal recovery systems and variable frequency drives (VFD) reduce energy consumption by up to 30% compared to traditional models.'],
                                                        ['number' => '03', 'title' => 'Turnkey Solutions', 'description' => 'From factory layout design to installation, commissioning, and operator training, we provide complete end-to-end engineering support.'],
                                                    ]),
                                            ]),

                                        Builder\Block::make('industries_promise')
                                            ->label('Industries - Promise')
                                            ->icon('heroicon-m-shield-check')
                                            ->schema([
                                                TextInput::make('badge')->default('[ OUR COMMITMENT ]'),
                                                TextInput::make('title')->default('The DO-RYT Guarantee'),
                                                Repeater::make('features')
                                                    ->schema([
                                                        TextInput::make('icon')->label('Heroicon Name')->default('cog-6-tooth')->required(),
                                                        TextInput::make('title')->required(),
                                                        Textarea::make('description')->required(),
                                                    ])->default([
                                                        ['icon' => 'cog-6-tooth', 'title' => 'Engineered Performance', 'description' => 'Built with precision components and advanced automation for maximum throughput.'],
                                                        ['icon' => 'shield-check', 'title' => 'Built for Reliability', 'description' => 'Rugged SS-304/316L construction with rigorous FAT testing on every unit.'],
                                                        ['icon' => 'wrench-screwdriver', 'title' => 'Designed Around Process', 'description' => 'Custom configurations tailored to your specific product and capacity needs.'],
                                                        ['icon' => 'briefcase', 'title' => 'Project Support', 'description' => 'From factory layout and installation to commissioning and operator training.'],
                                                    ]),
                                            ]),

                                        Builder\Block::make('contact_section')
                                            ->label('Contact - Full Section')
                                            ->icon('heroicon-m-envelope')
                                            ->schema([
                                                TextInput::make('badge')->default('[ FORM-CONTROL ]'),
                                                TextInput::make('form_title')->default('Send technical inquiry'),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Publishing')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft')
                                    ->required(),
                            ]),

                        SeoSchema::make(),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
