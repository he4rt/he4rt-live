<?php

namespace Live\Integrations\Twitch\Common;

use GuzzleHttp\Client;
use Live\Integrations\Twitch\EventSub\Domain\TwitchEventSubService;
use Live\Integrations\Twitch\EventSub\Infrastructure\TwitchEventSubClient;
use Live\Integrations\Twitch\Subscriber\Infrastructure\TwitchSubscribersClient;
use Live\Integrations\Twitch\OAuth\Domain\TwitchOAuthService;
use Live\Integrations\Twitch\Subscriber\Domain\TwitchSubscribersService;
use Live\Integrations\Twitch\OAuth\Infrastructure\TwitchOAuthClient;

final class TwitchBaseClient implements TwitchService
{

    public function __construct(private Client $client)
    {
    }

    public function oauth(): TwitchOAuthService
    {
        return new TwitchOAuthClient($this->client);
    }

    public function subscribers(): TwitchSubscribersService
    {
        return new TwitchSubscribersClient($this->client);
    }

    public function eventSub(): TwitchEventSubService
    {
        return new TwitchEventSubClient($this->client);
    }
}
