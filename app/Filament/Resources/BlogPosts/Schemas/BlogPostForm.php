<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use App\Filament\Schemas\SeoSchema;
use Filament\Forms\Components\DateTimePicker;
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

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Post Details')
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
                                Select::make('blog_category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->placeholder('Enter a short summary or excerpt...'),
                                RichEditor::make('content')
                                    ->placeholder('Write the blog post body here...')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Publishing & Metadata')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                DateTimePicker::make('published_at')
                                    ->label('Publish Date'),
                                Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                            ]),

                        Section::make('Featured Image')
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
