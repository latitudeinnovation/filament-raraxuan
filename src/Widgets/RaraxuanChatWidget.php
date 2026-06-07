<?php

namespace LatitudeInnovation\FilamentRaraxuan\Widgets;

use Filament\Widgets\Widget;

class RaraxuanChatWidget extends Widget
{
    protected static string $view = 'filament-raraxuan::widgets.chat-widget';

    protected int|string|array $columnSpan = 'full';

    public ?string $message = null;

    public ?string $response = null;

    public function send(): void
    {
        $this->response = 'TODO: Connect chat widget to Raraxuan SDK.';
    }
}
