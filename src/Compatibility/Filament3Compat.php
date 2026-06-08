<?php

namespace LatitudeInnovation\FilamentRaraxuan\Compatibility;

use Filament\Panel;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Concerns\RegistersRaraxuanResources;
use LatitudeInnovation\FilamentRaraxuan\Compatibility\Contracts\FilamentCompat;

class Filament3Compat implements FilamentCompat
{
    use RegistersRaraxuanResources;

    public function register(Panel $panel): void
    {
        $this->registerSharedResources($panel);
    }
}
