<?php

namespace LatitudeInnovation\FilamentRaraxuan\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class RaraxuanPlayground extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static string $view = 'filament-raraxuan::pages.playground';

    protected static ?string $title = 'Raraxuan Playground';

    protected static ?string $navigationLabel = 'Playground';

    public ?array $data = [];

    public ?string $response = null;

    public static function getNavigationGroup(): ?string
    {
        return config('filament-raraxuan.navigation_group', 'Raraxuan AI');
    }

    public function mount(): void
    {
        $this->form->fill([
            'engine' => config('filament-raraxuan.default_engine'),
            'prompt' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('engine')
                    ->required(),

                Forms\Components\Textarea::make('prompt')
                    ->rows(8)
                    ->required(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();

        try {
            /**
             * Replace this part with your SDK method later:
             *
             * $this->response = Raraxuan::chat()
             *     ->engine($state['engine'])
             *     ->prompt($state['prompt'])
             *     ->send();
             */

            $this->response = 'TODO: Connect this page to latitudeinnovation/laravel-raraxuan SDK.';

            Notification::make()
                ->title('Prompt submitted')
                ->success()
                ->send();

        } catch (\Throwable $e) {
            Notification::make()
                ->title('Raraxuan request failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
