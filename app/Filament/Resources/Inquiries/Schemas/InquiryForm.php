<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    // Main column
                    Grid::make(1)->schema([
                        Section::make('Inquiry Information')
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label('Interested Product')
                                    ->placeholder('Select a product'),
                                Grid::make(2)->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->placeholder('Client Full Name'),
                                    TextInput::make('company')
                                        ->placeholder('Company Name'),
                                ]),
                                Grid::make(2)->schema([
                                    TextInput::make('email')
                                        ->label('Email Address')
                                        ->email()
                                        ->required()
                                        ->placeholder('client@example.com'),
                                    TextInput::make('phone')
                                        ->tel()
                                        ->placeholder('+91-98765-43210'),
                                ]),
                                Textarea::make('message')
                                    ->required()
                                    ->rows(5)
                                    ->placeholder('Type inquiry message...'),
                            ]),

                        Section::make('Internal Notes')
                            ->schema([
                                Textarea::make('notes')
                                    ->rows(3)
                                    ->placeholder('Add internal follow-up notes...'),
                            ]),
                    ])->columnSpan(2),

                    // Sidebar / Settings column
                    Grid::make(1)->schema([
                        Section::make('Status & Assignment')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'new' => '🔵 New',
                                        'in_progress' => '🟡 In Progress',
                                        'completed' => '🟢 Completed',
                                        'rejected' => '🔴 Rejected',
                                    ])
                                    ->default('new')
                                    ->required(),
                                Select::make('priority')
                                    ->options([
                                        'low' => 'Low',
                                        'normal' => 'Normal',
                                        'high' => 'High',
                                        'urgent' => 'Urgent 🚨',
                                    ])
                                    ->default('normal')
                                    ->required(),
                                Select::make('assigned_to')
                                    ->relationship('assignee', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label('Assigned Agent')
                                    ->placeholder('Unassigned'),
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
