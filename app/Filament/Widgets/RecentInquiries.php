<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentInquiries extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Inquiry::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Client Name')
                    ->weight(FontWeight::Bold),
                TextColumn::make('company')
                    ->label('Company'),
                TextColumn::make('product.name')
                    ->label('System Inquiry')
                    ->placeholder('General inquiry'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'danger',
                        'contacted' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->since(),
            ])
            ->paginated(false);
    }
}
