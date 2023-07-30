<?php

return [
    'integrations' => [
        'twitch' => [
            'dh_channel_id' => '227168488',
            'client_id' => env('TWITCH_OAUTH_CLIENT_ID'),
            'client_secret' => env('TWITCH_OAUTH_CLIENT_SECRET'),
            'redirect_uri' => env('TWITCH_OAUTH_REDIRECT_URI'),
            'scopes' => env('TWITCH_OAUTH_SCOPES')
        ],
    ]
];
