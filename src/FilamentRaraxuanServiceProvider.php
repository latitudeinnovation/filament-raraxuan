<?php

namespace LatitudeInnovation\FilamentRaraxuan;

use Illuminate\Support\ServiceProvider;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Contracts\FilamentCompat;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Filament3Compat;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Filament4Compat;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Filament5Compat;
use LatitudeInnovation\FilamentRaraxuan\Support\FilamentVersion;

class FilamentRaraxuanServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-raraxuan.php', 'filament-raraxuan');

        $this->app->singleton(FilamentCompat::class, function () {
            return match (FilamentVersion::major()) {
                3 => new Filament3Compat(),
                4 => new Filament4Compat(),
                5 => new Filament5Compat(),
                default => throw new \RuntimeException('Unsupported Filament major version for filament-raraxuan plugin.'),
            };
        });
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-raraxuan');

        $this->publishes([
            __DIR__ . '/../config/filament-raraxuan.php' => config_path('filament-raraxuan.php'),
        ], 'filament-raraxuan-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/filament-raraxuan'),
        ], 'filament-raraxuan-views');
    }
}
