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
        $pages = [
            RaraxuanSettings::class,
        ];

        if (config('filament-raraxuan.enable_playground', true)) {
            $pages[] = RaraxuanPlayground::class;
        }

        $panel->pages($pages);

        if (config('filament-raraxuan.enable_chat_widget', true)) {
            $panel->widgets([
                RaraxuanChatWidget::class,
            ]);
        }
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
