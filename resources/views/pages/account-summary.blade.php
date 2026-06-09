<x-filament-panels::page>
    <div class="raraxuan-stack">
        <div class="raraxuan-toolbar">
            <x-filament::button type="button" wire:click="loadSummary">
                Refresh
            </x-filament::button>
        </div>

        <x-filament::section>
            <x-slot name="heading">
                Organization
            </x-slot>

            @if ($organization !== [])
                <dl class="raraxuan-grid raraxuan-grid--organization">
                    <div>
                        <dt class="raraxuan-label">ID</dt>
                        <dd class="raraxuan-value">{{ data_get($organization, 'id', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Name</dt>
                        <dd class="raraxuan-value">{{ data_get($organization, 'name', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Slug</dt>
                        <dd class="raraxuan-value">{{ data_get($organization, 'slug', '-') }}</dd>
                    </div>
                </dl>
            @else
                <p class="raraxuan-muted">No organization data available.</p>
            @endif
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                Usage
            </x-slot>

            @if ($usage !== [])
                <dl class="raraxuan-grid raraxuan-grid--usage">
                    <div>
                        <dt class="raraxuan-label">From</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'from', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">To</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'to', '-') }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Requests</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'request_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Success</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'success_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Failed</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'failed_count', 0) }}</dd>
                    </div>

                    <div>
                        <dt class="raraxuan-label">Total Cost</dt>
                        <dd class="raraxuan-value">{{ data_get($usage, 'total_cost', '0') }}</dd>
                    </div>
                </dl>
            @else
                <p class="raraxuan-muted">No usage data available.</p>
            @endif
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                Prompt Templates
            </x-slot>

            @if ($prompts !== [])
                <div class="raraxuan-table-wrapper">
                    <table class="raraxuan-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Version</th>
                                <th>Variables</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prompts as $prompt)
                                <tr>
                                    <td class="raraxuan-table-primary">{{ data_get($prompt, 'name', '-') }}</td>
                                    <td>{{ data_get($prompt, 'slug', '-') }}</td>
                                    <td>{{ data_get($prompt, 'description') ?: '-' }}</td>
                                    <td>{{ data_get($prompt, 'active_version', '-') }}</td>
                                    <td>
                                        @php($variables = data_get($prompt, 'variables', []))

                                        @if (is_array($variables) && $variables !== [])
                                            <div class="raraxuan-variable-list">
                                                @foreach ($variables as $key => $description)
                                                    <div>
                                                        <span class="raraxuan-variable-name">{{ $key }}</span>
                                                        <span class="raraxuan-variable-description">
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
                <p class="raraxuan-muted">No prompt templates available.</p>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
