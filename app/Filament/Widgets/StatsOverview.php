<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Inquiry;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $inquiriesCount = Inquiry::query()->count();
        $messagesCount = ContactMessage::query()->count();
        $productsCount = Product::query()->count();
        $blogsCount = BlogPost::query()->count();

        // Calculate last 24h inquiries
        $newInquiries = Inquiry::query()
            ->where('created_at', '>=', now()->subDay())
            ->count();

        return [
            Stat::make('Product Systems', $productsCount)
                ->description('Active catalog units')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('success'),
            Stat::make('Product Inquiries', $inquiriesCount)
                ->description($newInquiries > 0 ? "{$newInquiries} new in last 24h" : 'No new inquiries today')
                ->descriptionIcon('heroicon-m-document-text')
                ->color($newInquiries > 0 ? 'success' : 'gray'),
            Stat::make('General Contact Messages', $messagesCount)
                ->description('Inbox submissions')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('info'),
            Stat::make('Insights Published', $blogsCount)
                ->description('Active articles & news')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('warning'),
        ];
    }
}
