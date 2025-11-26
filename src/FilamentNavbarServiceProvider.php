<?php

namespace Waffentrager\FilamentNavbar;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentNavbarServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-autohide-navbar';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(self::$name)
            ->hasConfigFile('filament-navbar')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        // Only register assets if enabled in config
        if (config('filament-navbar.enabled', true)) {
            // Register CSS asset
            FilamentAsset::register([
            Css::make('filament-autohide-navbar', __DIR__ . '/../resources/dist/filament-navbar.css'),
        ], package: 'waffentrager/filament-autohide-navbar');
        }
    }
}

