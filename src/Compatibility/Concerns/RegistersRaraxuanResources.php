<?php

namespace LatitudeInnovation\FilamentRaraxuan\Compatibility\Concerns;

use Filament\Panel;
use LatitudeInnovation\FilamentRaraxuan\Pages\RaraxuanAccountSummary;

trait RegistersRaraxuanResources
{
    protected function registerSharedResources(Panel $panel): void
    {
        $panel->pages([
            RaraxuanAccountSummary::class,
        ]);
    }
}
