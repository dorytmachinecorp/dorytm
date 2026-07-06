<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class InquiriesByProductChart extends ChartWidget
{
    protected ?string $heading = 'Inquiries by Product';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $inquiries = DB::table('inquiries')
            ->select('products.name', DB::raw('count(inquiries.id) as total'))
            ->join('products', 'inquiries.product_id', '=', 'products.id')
            ->groupBy('products.name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries',
                    'data' => $inquiries->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgba(39, 167, 74, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                    ],
                ],
            ],
            'labels' => $inquiries->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
