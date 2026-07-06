<?php

namespace App\Filament\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class SeoSchema
{
    public static function make(): Group
    {
        return Group::make()
            ->relationship('seoMetadata')
            ->schema([
                Section::make('SEO & Metadata')
                    ->description('Customize how this page appears on search engines and social media.')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->placeholder('Defaults to name or title')
                            ->maxLength(60)
                            ->hint(fn ($state, $component) => 'Max 60 chars'),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(160)
                            ->hint(fn ($state, $component) => 'Max 160 chars'),
                        TextInput::make('keywords')
                            ->label('Keywords')
                            ->placeholder('Comma separated list of keywords (optional)'),
                        TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->placeholder('Leave empty for default URL'),
                    ]),
            ]);
    }
}
