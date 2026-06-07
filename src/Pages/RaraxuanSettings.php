<?php

namespace LatitudeInnovation\FilamentRaraxuan\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\File;

class RaraxuanSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament-raraxuan::pages.settings';

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

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('api_key')
                    ->label('API Key')
                    ->password()
                    ->revealable()
                    ->required(),

                Forms\Components\TextInput::make('base_url')
                    ->label('Base URL')
                    ->default('https://ai.raraxuan.com')
                    ->required(),

                Forms\Components\TextInput::make('default_engine')
                    ->label('Default Engine')
                    ->required(),
            ])
            ->statePath('data');
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
