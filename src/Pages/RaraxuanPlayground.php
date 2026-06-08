<?php

namespace LatitudeInnovation\FilamentRaraxuan\Pages;

use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use LatitudeInnovation\FilamentRaraxuan\Support\FormatsRaraxuanResponses;
use LatitudeInnovation\FilamentRaraxuan\Support\RaraxuanApi;

class RaraxuanPlayground extends Page implements HasForms
{
    use InteractsWithForms;
    use FormatsRaraxuanResponses;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-sparkles';

    protected string $view = 'filament-raraxuan::pages.playground';

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

    public function form(object $form): object
    {
        $components = [
            Forms\Components\TextInput::make('engine')
                ->required(),

            Forms\Components\Textarea::make('prompt')
                ->rows(8)
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

    public function submit(): void
    {
        $state = $this->form->getState();

        try {
            $response = app(RaraxuanApi::class)->simple($state['prompt']);

            $this->response = $this->formatRaraxuanResponse($response);

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
