<?php

namespace LatitudeInnovation\FilamentRaraxuan\Support;

use Composer\InstalledVersions;

class FilamentVersion
{
    public static function major(): int
    {
        if (! class_exists(InstalledVersions::class)) {
            throw new \RuntimeException('Composer InstalledVersions is not available; cannot detect Filament version.');
        }

        if (! InstalledVersions::isInstalled('filament/filament')) {
            throw new \RuntimeException('filament/filament is not installed.');
        }

        $version = InstalledVersions::getPrettyVersion('filament/filament')
            ?? InstalledVersions::getVersion('filament/filament');

        if (! is_string($version) || $version === '') {
            throw new \RuntimeException('Unable to resolve filament/filament version.');
        }

        $normalized = ltrim($version, 'v');
        preg_match('/^(\d+)/', $normalized, $matches);

        if (! isset($matches[1])) {
            throw new \RuntimeException('Unable to parse Filament major version from: ' . $version);
        }

        return (int) $matches[1];
    }
}
