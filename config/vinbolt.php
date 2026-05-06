<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | Your VINbolt API key. Issue one in Studio → API Keys. Use a sandbox key
    | (sk_sandbox_*) in non-production environments.
    |
    */
    'api_key' => env('VINBOLT_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the VINbolt API. Defaults to production.
    |
    */
    'base_url' => env('VINBOLT_BASE_URL', 'https://vinbolt.com/api/v1'),

    /*
    |--------------------------------------------------------------------------
    | Webhook Secret
    |--------------------------------------------------------------------------
    |
    | Shared secret used to verify the signature on inbound webhooks from
    | VINbolt. Found in Studio → Webhooks alongside the endpoint URL.
    |
    */
    'webhook_secret' => env('VINBOLT_WEBHOOK_SECRET'),
];
