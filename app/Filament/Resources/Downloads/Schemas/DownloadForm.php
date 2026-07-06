<?php

namespace App\Filament\Resources\Downloads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DownloadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Downloadable Document Details')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->placeholder('e.g. FD-10000 Technical Datasheet'),
                                Textarea::make('description')
                                    ->rows(4)
                                    ->placeholder('Provide a brief description of the document...'),
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

                        Section::make('Attachment File')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('file')
                                    ->collection('files')
                                    ->maxFiles(1)
                                    ->required()
                                    ->helperText('Upload the file (PDF, ZIP, DOCX, XLSX).'),
                            ]),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
