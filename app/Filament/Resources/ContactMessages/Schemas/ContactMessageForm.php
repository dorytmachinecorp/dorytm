<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column - Message details (Read-only)
                    Grid::make(1)->schema([
                        Section::make('Message Details')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('name')
                                        ->disabled()
                                        ->dehydrated(false),
                                    TextInput::make('email')
                                        ->label('Email Address')
                                        ->email()
                                        ->disabled()
                                        ->dehydrated(false),
                                ]),
                                Grid::make(2)->schema([
                                    TextInput::make('phone')
                                        ->disabled()
                                        ->dehydrated(false),
                                    TextInput::make('subject')
                                        ->disabled()
                                        ->dehydrated(false),
                                ]),
                                Textarea::make('message')
                                    ->rows(6)
                                    ->disabled()
                                    ->dehydrated(false),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar - Action & Notes
                    Grid::make(1)->schema([
                        Section::make('Status')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'new' => '🔵 New',
                                        'read' => '📖 Read',
                                        'replied' => '✉️ Replied',
                                        'archived' => '📁 Archived',
                                    ])
                                    ->default('new')
                                    ->required(),
                            ]),

                        Section::make('Agent Notes')
                            ->schema([
                                Textarea::make('notes')
                                    ->rows(4)
                                    ->placeholder('Add internal notes regarding this contact message...'),
                            ]),

                        Section::make('Metadata')
                            ->schema([
                                TextInput::make('ip_address')
                                    ->label('IP Address')
                                    ->disabled()
                                    ->dehydrated(false),
                            ]),
                    ])->columnSpan(1),
                ])->columnSpanFull(),
            ]);
    }
}
