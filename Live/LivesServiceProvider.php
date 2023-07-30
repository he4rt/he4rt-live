<?php

namespace Live;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Live\Integrations\Twitch\Common\TwitchBaseClient;
use Live\Integrations\Twitch\Common\TwitchService;
use Live\Integrations\Twitch\OAuth\Domain\TwitchOAuthService;
use Live\Integrations\Twitch\OAuth\Infrastructure\TwitchOAuthClient;

class LivesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerTwitchProvider();
    }

    private function registerTwitchProvider(): void
    {
        $this->app->bind(TwitchService::class, function () {
            $client = new Client([
                'headers' => ['Client-Id' => config('kingdom.integrations.twitch.client_id')]
            ]);
            return new TwitchBaseClient($client);
        });
        $this->app->bind(TwitchOAuthService::class, TwitchOAuthClient::class);
    }
}
