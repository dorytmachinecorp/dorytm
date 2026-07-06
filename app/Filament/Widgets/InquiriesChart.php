<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Widgets\ChartWidget;

class InquiriesChart extends ChartWidget
{
    protected ?string $heading = 'Inquiries Traffic';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $months = [];
        $counts = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $months[] = $month->format('M Y');

            $counts[] = Inquiry::query()
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries Received',
                    'data' => $counts,
                    'borderColor' => '#14b8a6',
                    'backgroundColor' => 'rgba(20, 184, 166, 0.1)',
                    'fill' => 'start',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
