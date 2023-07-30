<?php

namespace Live\Integrations\Twitch\OAuth\Domain\DTO;

use Live\Authentication\OAuth\Domain\DTO\OAuthAccessDTO;

class TwitchOAuthAccessDTO extends OAuthAccessDTO
{

    public static function make(array $payload): self
    {
        return new self(
            accessToken: $payload['access_token'],
            refreshToken: $payload['refresh_token'],
            expiresIn: $payload['expires_in']
        );
    }
}
