<?php

namespace Live\Webhooks;

use Live\Webhooks\Transformers\TwitchWebhookTransformer;
use Live\Webhooks\Transformers\WebhookTransformerContract;

enum WebhookProviderEnum: string
{
    case TWITCH = 'twitch';

    public function getTransformer(): WebhookTransformerContract
    {
        return match ($this) {
            self::TWITCH => new TwitchWebhookTransformer,
        };
    }

    public function getChallengeKey(): string
    {
        return match ($this) {
            self::TWITCH => 'challenge',
        };
    }

}
