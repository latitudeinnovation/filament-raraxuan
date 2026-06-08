<?php

namespace LatitudeInnovation\FilamentRaraxuan\Compatibility\Concerns;

use Filament\Panel;
use LatitudeInnovation\FilamentRaraxuan\Pages\RaraxuanPlayground;
use LatitudeInnovation\FilamentRaraxuan\Pages\RaraxuanSettings;
use LatitudeInnovation\FilamentRaraxuan\Widgets\RaraxuanChatWidget;

trait RegistersRaraxuanResources
{
    protected function registerSharedResources(Panel $panel): void
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
}
