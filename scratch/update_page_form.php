<?php

$filePath = __DIR__.'/../app/Filament/Resources/Pages/Schemas/PageForm.php';
$content = file_get_contents($filePath);

$newBlocks = <<<PHP
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
                                                TextInput::make('badge')->default('[ ENGINEERED FOR THE WORLD\\'S MOST DEMANDING FACTORY FLOORS ]'),
                                                TextInput::make('items')->label('Items (comma separated)')->default('// SIEMENS, // BAYER GLOBAL, // NESTLÉ, // DANONE NUTRITION, // UNILEVER, // PFIZER PHARMA'),
                                            ]),

                                        Builder\Block::make('home_heritage')
                                            ->label('Home - Heritage')
                                            ->icon('heroicon-m-clock')
                                            ->schema([
                                                TextInput::make('badge')->default('[ TWO DECADES OF INNOVATION ]'),
                                                TextInput::make('title')->default('We don\\'t just build machines. We architect production ecosystems.'),
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

                                        Builder\Block::make('about_story_original')
                                            ->label('About - Company Story (Original)')
                                            ->icon('heroicon-m-book-open')
                                            ->schema([
                                                TextInput::make('badge')->default('[ THE LEGACY ]'),
                                            ]),

                                        Builder\Block::make('about_facilities_original')
                                            ->label('About - Facilities (Original)')
                                            ->icon('heroicon-m-building-office-2')
                                            ->schema([
                                                TextInput::make('badge')->default('[ FACILITIES ]'),
                                            ]),

                                        Builder\Block::make('products_why_choose')
                                            ->label('Products - Why Choose')
                                            ->icon('heroicon-m-light-bulb')
                                            ->schema([
                                                TextInput::make('badge')->default('[ CAPABILITIES ]'),
                                                TextInput::make('title')->default('Why Choose DO-RYT?'),
                                            ]),

                                        Builder\Block::make('industries_promise')
                                            ->label('Industries - Promise')
                                            ->icon('heroicon-m-shield-check')
                                            ->schema([
                                                TextInput::make('badge')->default('[ OUR COMMITMENT ]'),
                                                TextInput::make('title')->default('The DO-RYT Guarantee'),
                                            ]),

                                        Builder\Block::make('contact_section')
                                            ->label('Contact - Full Section')
                                            ->icon('heroicon-m-envelope')
                                            ->schema([
                                                TextInput::make('badge')->default('[ FORM-CONTROL ]'),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
PHP;

$search = "                                    ])\n                                    ->columnSpanFull(),";

if (strpos($content, $search) !== false) {
    $content = str_replace($search, $newBlocks, $content);
    file_put_contents($filePath, $content);
    echo "Successfully updated PageForm.php\n";
} else {
    echo "Could not find the search string to replace.\n";
}
