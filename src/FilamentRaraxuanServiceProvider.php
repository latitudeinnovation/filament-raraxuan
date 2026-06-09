<?php

namespace LatitudeInnovation\FilamentRaraxuan;

use Illuminate\Support\ServiceProvider;

class FilamentRaraxuanServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-raraxuan.php', 'filament-raraxuan');
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
