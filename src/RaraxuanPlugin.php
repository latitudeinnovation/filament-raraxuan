<?php

namespace LatitudeInnovation\FilamentRaraxuan;

use Filament\Contracts\Plugin;
use Filament\Panel;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Contracts\FilamentCompat;

class RaraxuanPlugin implements Plugin
{
    public function getId(): string
    {
        return 'raraxuan';
    }

    public function register(Panel $panel): void
    {
        app(FilamentCompat::class)->register($panel);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
