<x-filament-panels::page>
    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Save
        </x-filament::button>
    </form>

    <div class="mt-6 rounded-xl bg-gray-50 p-4 text-sm dark:bg-gray-900">
        <p>Add these into your Laravel project's <code>.env</code>:</p>

        <pre class="mt-3 overflow-auto rounded bg-black p-4 text-white">RARAXUAN_API_KEY=your-api-key
RARAXUAN_API_URL=https://ai.raraxuan.com/api
RARAXUAN_DEFAULT_ENGINE=gpt-5.5</pre>
    </div>
</x-filament-panels::page>
