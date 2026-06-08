<?php

namespace LatitudeInnovation\FilamentRaraxuan\Pages;

use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class RaraxuanSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected string $view = 'filament-raraxuan::pages.settings';

    protected static ?string $title = 'Raraxuan Settings';

    protected static ?string $navigationLabel = 'Settings';

    public ?array $data = [];

    public static function getNavigationGroup(): ?string
    {
        return config('filament-raraxuan.navigation_group', 'Raraxuan AI');
    }

    public function mount(): void
    {
        $this->form->fill([
            'api_key' => config('raraxuan.api_key'),
            'base_url' => config('raraxuan.base_url'),
            'default_engine' => config('filament-raraxuan.default_engine'),
        ]);
    }

    public function form(object $form): object
    {
        $components = [
            Forms\Components\TextInput::make('api_key')
                ->label('API Key')
                ->password()
                ->revealable()
                ->required(),

            Forms\Components\TextInput::make('base_url')
                ->label('Base URL')
                ->default('https://ai.raraxuan.com/api')
                ->required(),

            Forms\Components\TextInput::make('default_engine')
                ->label('Default Engine')
                ->required(),
        ];

        if (method_exists($form, 'components')) {
            return $form->components($components)->statePath('data');
        }

        if (method_exists($form, 'schema')) {
            return $form->schema($components)->statePath('data');
        }

        throw new \RuntimeException('Unsupported Filament form object: ' . $form::class);
    }

    public function save(): void
    {
        Notification::make()
            ->title('Settings saved')
            ->body('For now, copy these values into your .env file.')
            ->success()
            ->send();
    }
}
