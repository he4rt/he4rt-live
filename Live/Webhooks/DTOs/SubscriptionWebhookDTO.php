<?php

namespace Live\Webhooks\DTOs;


class SubscriptionWebhookDTO
{
    public function __construct(
        public readonly string $provider,
        public readonly string $action,
        public readonly string $status,
        public readonly string $providerId,
        public readonly string $providerLogin,
    )
    {
    }

    public static function make(array $payload): self
    {
        return new self(
            provider: $payload['provider'],
            action: $payload['action'],
            status: $payload['status'],
            providerId: $payload['provider_id'],
            providerLogin: $payload['provider_login'],
        );
    }
}
