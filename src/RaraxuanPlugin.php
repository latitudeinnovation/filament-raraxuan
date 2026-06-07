<?php

namespace LatitudeInnovation\FilamentRaraxuan;

use Filament\Contracts\Plugin;
use Filament\Panel;
use LatitudeInnovation\FilamentRaraxuan\Pages\RaraxuanSettings;
use LatitudeInnovation\FilamentRaraxuan\Pages\RaraxuanPlayground;
use LatitudeInnovation\FilamentRaraxuan\Widgets\RaraxuanChatWidget;

class RaraxuanPlugin implements Plugin
{
    public function getId(): string
    {
        return 'raraxuan';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                RaraxuanSettings::class,
                RaraxuanPlayground::class,
            ])
            ->widgets([
                RaraxuanChatWidget::class,
            ]);
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
