<?php

declare(strict_types=1);

namespace Vinbolt\Laravel;

use Illuminate\Support\ServiceProvider;
use Vinbolt\Sdk\VinboltClient;

class VinboltServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/vinbolt.php', 'vinbolt');

        $this->app->singleton(VinboltClient::class, function ($app) {
            $config = $app['config']->get('vinbolt');

            $apiKey = $config['api_key'] ?? null;

            if (empty($apiKey)) {
                throw new \RuntimeException('VINBOLT_API_KEY is not configured.');
            }

            return new VinboltClient($apiKey, $config['base_url'] ?? null);
        });

        $this->app->alias(VinboltClient::class, 'vinbolt');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/vinbolt.php' => $this->app->configPath('vinbolt.php'),
            ], 'vinbolt-config');
        }
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [VinboltClient::class, 'vinbolt'];
    }
}
