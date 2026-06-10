<?php

namespace LatitudeInnovation\FilamentRaraxuan\Pages;

use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use LatitudeInnovation\FilamentRaraxuan\Support\RaraxuanApi;

class RaraxuanAccountSummary extends Page
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected string $view = 'filament-raraxuan::pages.account-summary';

    protected static ?string $title = 'Raraxuan Account Summary';

    protected static ?string $navigationLabel = 'Account Summary';

    public array $organization = [];

    public array $prompts = [];

    public array $usage = [];

    public function mount(): void
    {
        $this->loadSummary();
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-raraxuan.navigation_group', 'Raraxuan AI');
    }

    public function loadSummary(): void
    {
        try {
            $response = app(RaraxuanApi::class)->accountSummary();
            $data = $this->arrayValue($response['data'] ?? []);

            $this->organization = $this->arrayValue($data['organization'] ?? []);
            $this->prompts = $this->arrayList($data['prompts'] ?? []);
            $this->usage = $this->arrayValue($data['usage'] ?? []);
        } catch (\Throwable $e) {
            $this->organization = [];
            $this->prompts = [];
            $this->usage = [];

            Notification::make()
                ->title('Raraxuan account summary failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function arrayValue(mixed $value): array
    {
        return is_array($value) ? $value : [];
    }

    protected function arrayList(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        return array_values(array_filter($value, is_array(...)));
    }
}
