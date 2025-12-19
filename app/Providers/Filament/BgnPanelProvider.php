<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Bahans\BahanResource;
use App\Filament\Resources\Jenis\JenisResource;
use App\Filament\Resources\Kabupatens\KabupatenResource;
use App\Filament\Resources\Kategoris\KategoriResource;
use App\Filament\Resources\Kecamatans\KecamatanResource;
use App\Filament\Resources\Propinsis\PropinsiResource;
use App\Filament\Resources\Tahuns\TahunResource;
use App\Filament\Resources\Tarifs\TarifResource;
use App\Filament\Resources\Yayasans\YayasanResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Enums\GlobalSearchPosition;
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;


class BgnPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('cb')
            ->path('cb')
            ->login()
            ->registration()
            ->plugins([
                AuthUIEnhancerPlugin::make()
                    ->formPanelPosition('left')
                    ->formPanelWidth('40%')
                    ->formPanelBackgroundColor(Color::Cyan, '700')
                    // ->emptyPanelBackgroundImageOpacity('50%')
                    ->emptyPanelBackgroundImageOpacity('90%')
                    ->emptyPanelBackgroundImageUrl('https://images.pexels.com/photos/35039304/pexels-photo-35039304.jpeg')
                // ->emptyPanelBackgroundImageUrl('https://www.pexels.com/photo/scenic-view-of-husavik-harbor-in-iceland-35039304/')
            ])
            ->colors([
                'primary' => Color::Lime,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
            ->authMiddleware([
                Authenticate::class,
            ])
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Lime,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->viteTheme('resources/css/filament/bgn/theme.css')
            ->brandName('Dapur Cempaka')
            // ->brandLogo(asset('images/Sppg.png'))
            ->sidebarCollapsibleOnDesktop()
            // ->topbar(false)
            ->globalSearch(position: GlobalSearchPosition::Sidebar);
        // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
        //     return $builder
        //         ->items([
        //             NavigationItem::make('Dashboard')
        //                 ->icon('heroicon-o-home')
        //                 // ->isActiveWhen(fn(): bool => original_request()->routeIs('filament.admin.pages.dashboard'))
        //                 ->url(fn(): string => Dashboard::getUrl()),
        //         ]);
        // ->groups([
        //     NavigationGroup::make('Modul Admin')
        //         ->collapsed()
        //         ->items([
        //             // Urutan: Tahun dulu (setting dasar), lalu User
        //             // ...TahunResource::getNavigationItems(),
        //             ...PropinsiResource::getNavigationItems(),
        //             ...KabupatenResource::getNavigationItems(),
        //             ...KecamatanResource::getNavigationItems(),
        //             // ...DesaResource::getNavigationItems(),
        //             ...KategoriResource::getNavigationItems(),
        //             // ...JenisResource::getNavigationItems(),
        //             ...BahanResource::getNavigationItems(),
        //             // ...TarifResource::getNavigationItems(),

        //         ]),
        //     NavigationGroup::make('Modul Yayasan')
        //         ->label('Modul Yayasan')
        //         ->items([
        //             ...YayasanResource::getNavigationItems(),
        //         ]),
        //     NavigationGroup::make('Management Website')
        //         ->items([
        //             // ...QnaSectionResource::getNavigationItems(),
        //             // ...TermsConditionResource::getNavigationItems(),
        //         ]),
        // ]);
        // });
    }
}
