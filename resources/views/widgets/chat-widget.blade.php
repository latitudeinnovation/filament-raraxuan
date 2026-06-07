<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Raraxuan AI Assistant
        </x-slot>

        <form wire:submit="send" class="space-y-4">
            <x-filament::input.wrapper>
                <x-filament::input
                    wire:model="message"
                    placeholder="Ask Raraxuan AI..."
                />
            </x-filament::input.wrapper>

            <x-filament::button type="submit">
                Send
            </x-filament::button>
        </form>

        @if ($response)
            <div class="mt-4 rounded-lg bg-gray-50 p-4 text-sm dark:bg-gray-900">
                {{ $response }}
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
