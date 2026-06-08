<?php

namespace LatitudeInnovation\FilamentRaraxuan\Support;

trait FormatsRaraxuanResponses
{
    protected function formatRaraxuanResponse(mixed $response): string
    {
        if (is_string($response)) {
            return $response;
        }

        if (is_array($response)) {
            foreach (['data', 'output', 'response', 'message', 'text', 'content', 'result'] as $key) {
                if (isset($response[$key]) && is_scalar($response[$key])) {
                    return (string) $response[$key];
                }
            }

            $encoded = json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

            return $encoded === false ? 'Unable to format Raraxuan response.' : $encoded;
        }

        if (is_scalar($response)) {
            return (string) $response;
        }

        return 'Unsupported Raraxuan response type.';
    }
}
