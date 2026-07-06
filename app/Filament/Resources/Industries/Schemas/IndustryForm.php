<?php

namespace App\Filament\Resources\Industries\Schemas;

use App\Filament\Schemas\SeoSchema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class IndustryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('General Information')
                            ->collapsible()
                            ->collapsed()
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
                                    ->label('Short Description')
                                    ->rows(3)
                                    ->required(),
                                RichEditor::make('full_description')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Status & Ordering')
                            ->collapsible()
                            ->collapsed()
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

                        Section::make('Banner Image')
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('images')
                                    ->image()
                                    ->maxFiles(1),
                            ]),

                        SeoSchema::make(),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
