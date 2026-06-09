<?php

namespace LatitudeInnovation\FilamentRaraxuan\Support;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use LatitudeInnovation\Raraxuan\Exceptions\InvalidConfigurationException;
use LatitudeInnovation\Raraxuan\Exceptions\MissingApiKeyException;

class RaraxuanApi
{
    public function accountSummary(): array
    {
        return $this->http()
            ->get($this->endpoint('/v1/account/summary'))
            ->throw()
            ->json();
    }

    protected function http(): PendingRequest
    {
        $request = Http::acceptJson()
            ->asJson()
            ->timeout($this->timeout());

        $apiKey = $this->apiKey();

        if ($apiKey !== null) {
            $request = $request->withToken($apiKey);
        }

        return $request;
    }

    protected function endpoint(string $path): string
    {
        return $this->baseUrl() . '/' . ltrim($path, '/');
    }

    protected function baseUrl(): string
    {
        $baseUrl = config('raraxuan.base_url');

        if (! is_string($baseUrl) || trim($baseUrl) === '') {
            throw InvalidConfigurationException::missingBaseUrl();
        }

        return rtrim($baseUrl, '/');
    }

    protected function apiKey(): ?string
    {
        $apiKey = config('raraxuan.api_key');

        if ($apiKey === null || trim((string) $apiKey) === '') {
            return null;
        }

        if (! is_string($apiKey)) {
            throw MissingApiKeyException::missing();
        }

        return trim($apiKey);
    }

    protected function timeout(): int
    {
        $timeout = (int) config('raraxuan.timeout', 60);

        if ($timeout <= 0) {
            throw InvalidConfigurationException::invalidTimeout();
        }

        return $timeout;
    }
}
