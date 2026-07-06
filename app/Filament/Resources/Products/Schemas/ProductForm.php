<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Filament\Schemas\SeoSchema;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
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
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Textarea::make('short_description')
                                    ->rows(3)
                                    ->placeholder('Enter a brief summary of the product...'),
                                RichEditor::make('full_description')
                                    ->placeholder('Detailed product description, features, specs...')
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Media')
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('images')
                                    ->image()
                                    ->maxFiles(1)
                                    ->helperText('Upload product flagship image. Recommended size: 800x600px.'),
                            ]),

                        Section::make('JSON Characteristics')
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                TagsInput::make('applications')
                                    ->placeholder('Add application...'),
                                TagsInput::make('features')
                                    ->placeholder('Add feature...'),
                                KeyValue::make('technical_specifications')
                                    ->keyLabel('Specification Name')
                                    ->valueLabel('Value'),
                            ]),

                        Section::make('Product Variants')
                            ->description('Define different models, sizes, or capacities (e.g., 12 Tray, 24 Tray).')
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                Repeater::make('variants')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Variant Name / Model')
                                            ->required()
                                            ->placeholder('e.g., 12 Tray Model'),
                                        KeyValue::make('specifications')
                                            ->label('Variant Specifications')
                                            ->keyLabel('Spec Name (e.g. Capacity)')
                                            ->valueLabel('Spec Value (e.g. 50kg)'),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->reorderableWithButtons(),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Status & Visibility')
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
                                Toggle::make('is_featured')
                                    ->label('Featured Product')
                                    ->default(false),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),

                        Section::make('Physical & Technical Parameters')
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                TextInput::make('capacity')
                                    ->placeholder('e.g. 500 kg/hr'),
                                TextInput::make('power')
                                    ->placeholder('e.g. 15 kW'),
                                TextInput::make('voltage')
                                    ->placeholder('e.g. 415V'),
                                TextInput::make('material')
                                    ->placeholder('e.g. SS-304'),
                                TextInput::make('dimensions')
                                    ->placeholder('e.g. 2000x1200x1800 mm'),
                                TextInput::make('weight')
                                    ->placeholder('e.g. 450 kg'),
                            ]),

                        SeoSchema::make(),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
