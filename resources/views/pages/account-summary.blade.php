<x-filament-panels::page>
    <div class="space-y-6">
        <div class="flex justify-end">
            <x-filament::button type="button" wire:click="loadSummary">
                Refresh
            </x-filament::button>
        </div>

        <x-filament::section>
            <x-slot name="heading">
                Organization
            </x-slot>

            @if ($organization !== [])
                <dl class="grid gap-4 sm:grid-cols-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($organization, 'id', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($organization, 'name', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($organization, 'slug', '-') }}</dd>
                    </div>
                </dl>
            @else
                <p class="text-sm text-gray-500 dark:text-gray-400">No organization data available.</p>
            @endif
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                Usage
            </x-slot>

            @if ($usage !== [])
                <dl class="grid gap-4 sm:grid-cols-2 lg:grid-cols-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">From</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'from', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">To</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'to', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Requests</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'request_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Success</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'success_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Failed</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'failed_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Cost</dt>
                        <dd class="mt-1 text-sm text-gray-950 dark:text-white">{{ data_get($usage, 'total_cost', '0') }}</dd>
                    </div>
                </dl>
            @else
                <p class="text-sm text-gray-500 dark:text-gray-400">No usage data available.</p>
            @endif
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                Prompt Templates
            </x-slot>

            @if ($prompts !== [])
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 text-sm dark:divide-gray-700">
                        <thead>
                            <tr class="text-left">
                                <th class="px-3 py-2 font-medium text-gray-500 dark:text-gray-400">Name</th>
                                <th class="px-3 py-2 font-medium text-gray-500 dark:text-gray-400">Slug</th>
                                <th class="px-3 py-2 font-medium text-gray-500 dark:text-gray-400">Description</th>
                                <th class="px-3 py-2 font-medium text-gray-500 dark:text-gray-400">Version</th>
                                <th class="px-3 py-2 font-medium text-gray-500 dark:text-gray-400">Variables</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @foreach ($prompts as $prompt)
                                <tr>
                                    <td class="px-3 py-3 text-gray-950 dark:text-white">{{ data_get($prompt, 'name', '-') }}</td>
                                    <td class="px-3 py-3 text-gray-700 dark:text-gray-300">{{ data_get($prompt, 'slug', '-') }}</td>
                                    <td class="px-3 py-3 text-gray-700 dark:text-gray-300">{{ data_get($prompt, 'description') ?: '-' }}</td>
                                    <td class="px-3 py-3 text-gray-700 dark:text-gray-300">{{ data_get($prompt, 'active_version', '-') }}</td>
                                    <td class="px-3 py-3 text-gray-700 dark:text-gray-300">
                                        @php($variables = data_get($prompt, 'variables', []))

                                        @if (is_array($variables) && $variables !== [])
                                            <div class="space-y-1">
                                                @foreach ($variables as $key => $description)
                                                    <div>
                                                        <span class="font-medium text-gray-950 dark:text-white">{{ $key }}</span>
                                                        <span class="text-gray-500 dark:text-gray-400">
                                                            {{ is_scalar($description) ? $description : json_encode($description) }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-sm text-gray-500 dark:text-gray-400">No prompt templates available.</p>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
