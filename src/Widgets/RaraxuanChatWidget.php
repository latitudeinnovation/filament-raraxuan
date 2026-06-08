<?php

namespace LatitudeInnovation\FilamentRaraxuan\Widgets;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use LatitudeInnovation\FilamentRaraxuan\Support\FormatsRaraxuanResponses;
use LatitudeInnovation\FilamentRaraxuan\Support\RaraxuanApi;

class RaraxuanChatWidget extends Widget
{
    use FormatsRaraxuanResponses;

    protected string $view = 'filament-raraxuan::widgets.chat-widget';

    protected int|string|array $columnSpan = 'full';

    public ?string $message = null;

    public ?string $response = null;

    public function send(): void
    {
        if (! is_string($this->message) || trim($this->message) === '') {
            return;
        }

        try {
            $response = app(RaraxuanApi::class)->simple(trim($this->message));

            $this->response = $this->formatRaraxuanResponse($response);
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Raraxuan request failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
