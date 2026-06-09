# Filament Raraxuan

Official Filament plugin for the Raraxuan AI Platform.

View your Raraxuan organization, available prompt templates, and usage statistics directly inside your Filament admin panel.

## Features

- Account summary page
- Available prompt templates
- Usage statistics
- Environment-based configuration
- Seamless Filament Integration

## Requirements

- PHP 8.2+
- Laravel 10, 11 or 12
- Filament 3.x
- Raraxuan API Account

## Frontend Assets

This plugin ships plain compiled CSS through Filament's asset system. It does not require the host app to install Tailwind CSS, add a Tailwind content source, or change Vite configuration.

If the page loads without plugin styling after installation or update, publish Filament assets:

```bash
php artisan filament:assets
```

## Version Compatibility

This branch supports Filament 3.x.

For Filament 5.x, install the `^5.0` release line instead.

The public plugin entrypoint remains the same across versions:

```php
use LatitudeInnovation\FilamentRaraxuan\RaraxuanPlugin;

$panel
    ->plugin(RaraxuanPlugin::make());
```

## Installation

### Filament v3

```bash
composer require latitudeinnovation/filament-raraxuan:^3.0
```

### Filament v5

```bash
composer require latitudeinnovation/filament-raraxuan:^5.0
```

Publish the config if you want to customize defaults:

```bash
php artisan vendor:publish --tag=filament-raraxuan-config
```

Register the plugin in your Filament panel provider:

```php
use LatitudeInnovation\FilamentRaraxuan\RaraxuanPlugin;

$panel
    ->plugin(RaraxuanPlugin::make());
```

Add your Raraxuan configuration to `.env`:

```dotenv
RARAXUAN_API_KEY=your-api-key
RARAXUAN_API_URL=https://ai.raraxuan.com/api
```
