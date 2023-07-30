<?php

namespace Live\Integrations\Twitch\Subscriber\Infrastructure;

use GuzzleHttp\Client;

use Live\Authentication\OAuth\Domain\DTO\OAuthAccessDTO;
use Live\Integrations\Twitch\Subscriber\Domain\DTO\TwitchSubscriberDTO;
use Live\Integrations\Twitch\Subscriber\Domain\TwitchSubscribersService;

class TwitchSubscribersClient implements TwitchSubscribersService
{
    public function __construct(private readonly Client $client)
    {
    }

    public function getSubscriptionState(OAuthAccessDTO $dto, string $twitchId, string $channelId): ?TwitchSubscriberDTO
    {
        $uri = 'https://api.twitch.tv/helix/subscriptions/user';
        $response = $this->client->request('GET', $uri, [
            'headers' => [
                'Client-ID' => config('kingdom.integrations.twitch.client_id'),
                'Authorization' => 'Bearer ' . $dto->accessToken,
            ],
            'query' => [
                'user_id' => $twitchId,
                'broadcaster_id' => $channelId,
            ],
        ]);

        $response = json_decode($response->getBody()->getContents(), true)['data'];

        if (count($response) == 0) {
            return null;
        }
        return TwitchSubscriberDTO::make($response[0]);
    }
}
