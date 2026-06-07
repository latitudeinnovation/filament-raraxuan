# Filament Raraxuan

Official Filament plugin for the Raraxuan AI Platform.

Bring AI capabilities directly into your Filament admin panel with AI playgrounds, assistants, content generators, bulk actions, and custom AI-powered workflows.

## Features

- AI Playground
- AI Chat Assistant
- Form Field Generators
- Rich Editor Actions
- Table Bulk Actions
- Content Generation
- Translation
- Summarization
- Custom Prompt Integration
- Multiple AI Engine Support
- Seamless Filament Integration

## Requirements

- PHP 8.2+
- Laravel 10, 11 or 12
- Filament 3.x
- Raraxuan API Account

## Installation

```bash
composer require latitudeinnovation/filament-raraxuan
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

Add your Raraxuan settings to `.env`:

```dotenv
RARAXUAN_API_KEY=your-api-key
RARAXUAN_BASE_URL=https://ai.raraxuan.com
RARAXUAN_DEFAULT_ENGINE=gpt-5.5
```
