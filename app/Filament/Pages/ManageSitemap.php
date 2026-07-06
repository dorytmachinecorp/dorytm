<?php

namespace App\Filament\Pages;

use App\Http\Controllers\SitemapController;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\File;

class ManageSitemap extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-map';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected string $view = 'filament.pages.manage-sitemap';

    protected static ?string $title = 'Manage Sitemap';

    public array $urls = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    public function mount()
    {
        $this->urls = SitemapController::getUrls();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate')
                ->label('Generate XML Sitemap')
                ->icon('heroicon-o-arrow-path')
                ->action('generateSitemap'),
        ];
    }

    public function generateSitemap()
    {
        $urls = SitemapController::getUrls();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;

        foreach ($urls as $url) {
            $xml .= '  <url>'.PHP_EOL;
            $xml .= '    <loc>'.htmlspecialchars($url['loc']).'</loc>'.PHP_EOL;
            $xml .= '    <lastmod>'.$url['lastmod'].'</lastmod>'.PHP_EOL;
            $xml .= '    <changefreq>'.$url['changefreq'].'</changefreq>'.PHP_EOL;
            $xml .= '    <priority>'.$url['priority'].'</priority>'.PHP_EOL;
            $xml .= '  </url>'.PHP_EOL;
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        Notification::make()
            ->title('Sitemap Generated')
            ->body('The sitemap.xml file has been successfully generated in the public directory.')
            ->success()
            ->send();
    }
}
