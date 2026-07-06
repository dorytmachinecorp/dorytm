<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Client Testimonial')
                            ->schema([
                                TextInput::make('client_name')
                                    ->required()
                                    ->placeholder('Client Name'),
                                Grid::make(2)->schema([
                                    TextInput::make('company')
                                        ->placeholder('Company Name'),
                                    TextInput::make('designation')
                                        ->placeholder('Designation (e.g. Director)'),
                                ]),
                                Select::make('rating')
                                    ->options([
                                        5 => '⭐⭐⭐⭐⭐ (5 Stars)',
                                        4 => '⭐⭐⭐⭐ (4 Stars)',
                                        3 => '⭐⭐⭐ (3 Stars)',
                                        2 => '⭐⭐ (2 Stars)',
                                        1 => '⭐ (1 Star)',
                                    ])
                                    ->default(5)
                                    ->required(),
                                Textarea::make('content')
                                    ->rows(4)
                                    ->required()
                                    ->placeholder('Type the client testimonial text here...'),
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

                        Section::make('Client Avatar')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('avatar')
                                    ->collection('avatars')
                                    ->image()
                                    ->maxFiles(1),
                            ]),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
