<?php

namespace Live\Integrations\Twitch\OAuth\Domain;

use Live\Authentication\OAuth\Domain\DTO\OAuthAccessDTO;
use Live\Authentication\OAuth\Domain\Interfaces\OAuthClientContract;

interface TwitchOAuthService extends OAuthClientContract
{
    public function authApp(): OAuthAccessDTO;
}
