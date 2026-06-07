<x-filament-panels::page>
    <form wire:submit="submit" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Send Prompt
        </x-filament::button>
    </form>

    @if ($response)
        <div class="mt-6 rounded-xl bg-gray-50 p-4 dark:bg-gray-900">
            <h3 class="font-bold">Response</h3>

            <pre class="mt-3 whitespace-pre-wrap text-sm">{{ $response }}</pre>
        </div>
    @endif
</x-filament-panels::page>
