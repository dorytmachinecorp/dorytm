<?php

namespace App\Filament\Resources\BlogCategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Blog Category Details')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set(
                                        'slug',
                                        Str::slug($state ?? ''),
                                    )),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                Textarea::make('description')
                                    ->rows(3)
                                    ->columnSpanFull(),
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
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
