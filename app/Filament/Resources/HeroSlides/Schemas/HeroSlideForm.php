<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Slide Content')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->placeholder('Main Title'),
                                TextInput::make('subtitle')
                                    ->placeholder('Subtitle / Accent Text'),
                                Textarea::make('description')
                                    ->rows(3)
                                    ->placeholder('Brief description of the slide...'),
                                Grid::make(2)->schema([
                                    TextInput::make('cta_text')
                                        ->label('CTA Button Text')
                                        ->placeholder('e.g. Discover More'),
                                    TextInput::make('cta_url')
                                        ->label('CTA Button URL')
                                        ->url()
                                        ->placeholder('e.g. /products'),
                                ]),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Status & Ordering')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),

                        Section::make('Slide Background')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('images')
                                    ->image()
                                    ->maxFiles(1),
                            ]),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
