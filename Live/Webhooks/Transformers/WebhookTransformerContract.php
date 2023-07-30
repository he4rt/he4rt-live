<?php

namespace Live\Webhooks\Transformers;

use Live\Webhooks\DTOs\SubscriptionWebhookDTO;

interface WebhookTransformerContract
{
    public function toDTO(array $payload): SubscriptionWebhookDTO;
}
