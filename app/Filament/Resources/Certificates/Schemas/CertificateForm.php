<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Certificate Details')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->placeholder('e.g. ISO 9001:2015 Certification'),
                                Textarea::make('description')
                                    ->rows(4)
                                    ->placeholder('Provide a brief description or scope of the certificate...'),
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

                        Section::make('Certificate Document / Image')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('images')
                                    ->image()
                                    ->maxFiles(1)
                                    ->required()
                                    ->helperText('Upload certificate image or PDF.'),
                            ]),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
