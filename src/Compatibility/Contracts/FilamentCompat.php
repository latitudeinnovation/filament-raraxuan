<?php

namespace LatitudeInnovation\FilamentRaraxuan\Compatibility\Contracts;

use Filament\Panel;

interface FilamentCompat
{
    public function register(Panel $panel): void;
}
