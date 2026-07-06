<?php

namespace App\Providers\Filament;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName(fn () => setting('general.site_name', 'DO-RYT Machine Corp'))
            ->colors(fn () => [
                'primary' => setting('general.primary_color', '#27a74a'),
                'gray' => Color::Zinc,
            ])
            ->brandLogo(fn () => setting('general.site_logo') ? Storage::disk('public')->url(setting('general.site_logo')) : null)
            ->darkModeBrandLogo(fn () => setting('general.site_logo') ? Storage::disk('public')->url(setting('general.site_logo')) : null)
            ->brandLogoHeight('2.5rem')
            ->favicon(fn () => setting('general.favicon') ? Storage::disk('public')->url(setting('general.favicon')) : null)
            ->renderHook(
                PanelsRenderHook::STYLES_AFTER,
                fn (): HtmlString => new HtmlString('
                    <style>
                        /* Custom scrollbar for a sleeker feel */
                        ::-webkit-scrollbar {
                            width: 6px;
                            height: 6px;
                        }
                        ::-webkit-scrollbar-track {
                            background: transparent;
                        }
                        ::-webkit-scrollbar-thumb {
                            background: rgba(156, 163, 175, 0.4);
                            border-radius: 9999px;
                        }
                        ::-webkit-scrollbar-thumb:hover {
                            background: rgba(156, 163, 175, 0.6);
                        }

                        /* Sidebar micro-animations */
                        .fi-sidebar-item-button {
                            transition: all 0.2s ease-in-out !important;
                        }
                        .fi-sidebar-item-active {
                            transform: scale(1.01);
                        }
                        .fi-logo img {
                            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.05));
                            transition: transform 0.3s ease-in-out;
                        }
                        .fi-logo img:hover {
                            transform: scale(1.03);
                        }
                        
                        /* Form input premium focus and shadows */
                        .fi-fo-text-input:focus-within, 
                        .fi-fo-select:focus-within {
                            box-shadow: 0 0 0 3px '.setting('general.primary_color', '#27a74a').'26 !important;
                        }
                    </style>
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
