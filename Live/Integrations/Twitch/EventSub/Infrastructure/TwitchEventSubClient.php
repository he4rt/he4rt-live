<?php

namespace Live\Integrations\Twitch\EventSub\Infrastructure;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Live\Integrations\Twitch\EventSub\Domain\Collections\EventSubCollection;
use Live\Integrations\Twitch\EventSub\Domain\DTOs\EventSubDTO;
use Live\Integrations\Twitch\EventSub\Domain\Entities\EventSubEntity;
use Live\Integrations\Twitch\EventSub\Domain\TwitchEventSubService;

class TwitchEventSubClient implements TwitchEventSubService
{

    private string $uri = 'https://api.twitch.tv/helix/eventsub/subscriptions';

    public function __construct(private readonly Client $client)
    {
    }

    public function createSubscription(EventSubDTO $eventSubDTO): EventSubEntity
    {
        $response = $this->client->post($this->uri, [
            'json' => $eventSubDTO->jsonSerialize(),
            'headers' => [
                'Authorization' => 'Bearer ' . Cache::get('twitch-app-token')
            ]
        ]);
        $parsedContent = json_decode($response->getBody()->getContents(), true);

        return EventSubEntity::make($parsedContent['data'][0]);
    }

    public function listSubscriptions(): EventSubCollection
    {
        $response = $this->client->get($this->uri, [
            'headers' => ['Authorization' => 'Bearer ' . Cache::get('twitch-app-token')]
        ]);
        $eventSubs = json_decode($response->getBody()->getContents(), true);
        /**
         * @method iterable<EventSubEntity> getIterator()
         */
        return EventSubCollection::make($eventSubs['data']);
    }

    public function deleteSubscription(EventSubEntity $eventSub): void
    {
        $uri = sprintf('%s?id=%s', $this->uri, $eventSub->id);
        $this->client->delete($uri, [
            'headers' => ['Authorization' => 'Bearer ' . Cache::get('twitch-app-token')]
        ]);
    }

    public function deleteAllSubscriptions(): void
    {
        $subscriptionsList = $this->listSubscriptions();

        /** @var EventSubEntity $subscription */
        foreach($subscriptionsList as $subscription) {
            $this->deleteSubscription($subscription);
        }
    }
}
