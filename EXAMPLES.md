# Usage Examples

## Basic Installation

After installing the package via Composer, the plugin works automatically with no configuration needed:

```bash
composer require waffentrager/filament-autohide-navbar
```

The sidebar will now:
- Show only icons by default (collapsed)
- Expand on hover to show full labels, badges, and sub-items

## Publishing Configuration (Optional)

If you want to customize the behavior, publish the configuration file:

```bash
php artisan vendor:publish --tag="filament-navbar-config"
```

This creates `config/filament-navbar.php` where you can adjust settings.

## Example Panel with Navigation Items

Here's a complete example of a Filament Panel Provider with various navigation types that work with the plugin:

```php
<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
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
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ]);
    }
}
```

## Custom Navigation with Groups and Badges

```php
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

public function panel(Panel $panel): Panel
{
    return $panel
        // ... other configuration
        ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->groups([
                NavigationGroup::make('Dashboard')
                    ->items([
                        NavigationItem::make('Overview')
                            ->icon('heroicon-o-home')
                            ->url(fn (): string => Dashboard::getUrl())
                            ->badge('New', 'success'),
                    ]),
                
                NavigationGroup::make('Content Management')
                    ->items([
                        NavigationItem::make('Posts')
                            ->icon('heroicon-o-document-text')
                            ->url(fn (): string => PostResource::getUrl())
                            ->badge(fn () => Post::where('status', 'draft')->count(), 'warning'),
                        
                        NavigationItem::make('Categories')
                            ->icon('heroicon-o-folder')
                            ->url(fn (): string => CategoryResource::getUrl()),
                        
                        NavigationItem::make('Tags')
                            ->icon('heroicon-o-tag')
                            ->url(fn (): string => TagResource::getUrl()),
                    ]),
                
                NavigationGroup::make('User Management')
                    ->collapsed()
                    ->items([
                        NavigationItem::make('Users')
                            ->icon('heroicon-o-users')
                            ->url(fn (): string => UserResource::getUrl())
                            ->badge(fn () => User::where('created_at', '>', now()->subDay())->count()),
                        
                        NavigationItem::make('Roles')
                            ->icon('heroicon-o-shield-check')
                            ->url(fn (): string => RoleResource::getUrl()),
                        
                        NavigationItem::make('Permissions')
                            ->icon('heroicon-o-lock-closed')
                            ->url(fn (): string => PermissionResource::getUrl()),
                    ]),
                
                NavigationGroup::make('Settings')
                    ->collapsed()
                    ->items([
                        NavigationItem::make('General')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->url(fn (): string => SettingsPage::getUrl()),
                        
                        NavigationItem::make('Notifications')
                            ->icon('heroicon-o-bell')
                            ->url(fn (): string => NotificationSettings::getUrl())
                            ->badge(fn () => auth()->user()->unreadNotifications->count(), 'danger'),
                    ]),
            ]);
        });
}
```

## Testing the Plugin

1. Navigate to your Filament admin panel
2. The sidebar should be collapsed by default (only icons visible)
3. Hover over the sidebar - it should expand smoothly
4. Move your mouse away - it should collapse back to icons
5. Badges and grouped items should appear/disappear appropriately

## Customizing with Resources

Each Filament Resource can have icons and badges that work seamlessly:

```php
<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationLabel = 'Blog Posts';
    
    protected static ?string $navigationGroup = 'Content';
    
    protected static ?int $navigationSort = 1;
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
    
    // ... rest of your resource
}
```

## Dark Mode Support

The plugin automatically supports Filament's dark mode. No additional configuration needed.

## Responsive Behavior

The plugin respects Filament's responsive breakpoints. On mobile devices, the standard Filament mobile navigation is used.

## Disabling for Specific Panels

If you have multiple panels and want to disable the plugin for specific ones, you can add custom CSS to those panels:

```php
public function panel(Panel $panel): Panel
{
    return $panel
        // ... other configuration
        ->renderHook(
            'panels::body.end',
            fn () => view('filament.hooks.disable-navbar-collapse')
        );
}
```

Then create `resources/views/filament/hooks/disable-navbar-collapse.blade.php`:

```blade
<style>
    aside.fi-sidebar {
        width: var(--sidebar-width, 16rem) !important;
    }
    
    aside.fi-sidebar:not(:hover) .fi-sidebar-item-label,
    aside.fi-sidebar:not(:hover) .fi-sidebar-group-label,
    aside.fi-sidebar:not(:hover) .fi-badge {
        opacity: 1 !important;
        width: auto !important;
    }
</style>
```

