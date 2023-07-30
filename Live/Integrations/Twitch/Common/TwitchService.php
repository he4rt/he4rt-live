<?php

namespace Live\Integrations\Twitch\Common;



use Live\Integrations\Twitch\EventSub\Domain\TwitchEventSubService;
use Live\Integrations\Twitch\OAuth\Domain\TwitchOAuthService;
use Live\Integrations\Twitch\Subscriber\Domain\TwitchSubscribersService;

interface TwitchService
{
    public function oauth(): TwitchOAuthService;

    public function subscribers(): TwitchSubscribersService;

    public function eventSub(): TwitchEventSubService;
}
