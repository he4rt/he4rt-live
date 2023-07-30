<?php

namespace Live\Integrations\Twitch\EventSub\Domain;

use Live\Integrations\Twitch\EventSub\Domain\Collections\EventSubCollection;
use Live\Integrations\Twitch\EventSub\Domain\DTOs\EventSubDTO;
use Live\Integrations\Twitch\EventSub\Domain\Entities\EventSubEntity;

interface TwitchEventSubService
{
    public function createSubscription(EventSubDTO $eventSubDTO): EventSubEntity;

    public function listSubscriptions(): EventSubCollection;

    public function deleteSubscription(EventSubEntity $eventSub): void;

    public function deleteAllSubscriptions(): void;
}
