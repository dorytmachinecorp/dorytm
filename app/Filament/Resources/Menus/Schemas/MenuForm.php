<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)->schema([
                    Section::make('Menu Details')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->placeholder('e.g. Main Navigation'),
                                TextInput::make('location')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->placeholder('e.g. header'),
                            ]),
                        ]),

                    Section::make('Menu Items')
                        ->schema([
                            Repeater::make('items')
                                ->relationship('items')
                                ->schema([
                                    Grid::make(3)->schema([
                                        TextInput::make('label')
                                            ->required()
                                            ->placeholder('Link Text'),
                                        TextInput::make('url')
                                            ->placeholder('e.g. /about or https://...'),
                                        Select::make('type')
                                            ->options([
                                                'custom' => 'Custom Link',
                                                'page' => 'Page',
                                                'category' => 'Category',
                                            ])
                                            ->default('custom')
                                            ->required(),
                                    ]),
                                    TextInput::make('sort_order')
                                        ->numeric()
                                        ->default(0)
                                        ->required(),
                                ])
                                ->orderColumn('sort_order')
                                ->defaultItems(0)
                                ->columnSpanFull(),
                        ]),
                ])->columnSpanFull(),
            ]);
    }
}
