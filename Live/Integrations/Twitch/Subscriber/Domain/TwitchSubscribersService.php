<?php

namespace Live\Integrations\Twitch\Subscriber\Domain;

use Live\Authentication\OAuth\Domain\DTO\OAuthAccessDTO;

interface TwitchSubscribersService
{
    public function getSubscriptionState(OAuthAccessDTO $dto, string $twitchId, string $channelId);
}
