<?php

namespace Tests\Feature\Controllers;

use Live\Webhooks\Enums\SubscriptionProvidersEnum;
use Tests\TestCase;

class WebhooksControllerTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testReceiveASuccessWebhook(
        SubscriptionProvidersEnum $provider,
        array                     $payload,
        array                     $expected,
        bool $hasProvider
    )
    {

        $response = $this->post(route('weebhooks-handler', $provider->value), $payload);

        $response->assertNoContent();

    }


    public static function dataProvider(): array
    {
        return [
            'twitch subscription without registered user' => [
                'provider' => SubscriptionProvidersEnum::TWITCH,
                'payload' => [
                    "subscription" => [
                        "id" => "f1c2a387-161a-49f9-a165-0f21d7a4e1c4",
                        "status" => "enabled",
                        "type" => "channel.subscription",
                        "version" => "1",
                        "cost" => 1,
                        "condition" => [
                            "broadcaster_user_id" => "12826"
                        ],
                        "transport" => [
                            "method" => "webhook",
                            "callback" => "https://example.com/webhooks/callback"
                        ],
                        "created_at" => "2019-11-16T10:11:12.634234626Z"
                    ],
                    "event" => [
                        "user_id" => "1337",
                        "user_login" => "danielhe4rt",
                        "user_name" => "danielhe4rt",
                        "broadcaster_user_id" => "12826",
                        "broadcaster_user_login" => "twitch",
                        "broadcaster_user_name" => "Twitch",
                        "followed_at" => "2020-07-15T18:16:11.17106713Z"
                    ],
                ],
                'expected' => [
                    'username' => 'danielhe4rt',
                    'provider' => 'twitch'
                ],
                'hasProvider' => false
            ],
            'twitch subscription with registered user' => [
                'provider' => SubscriptionProvidersEnum::TWITCH,
                'payload' => [
                    "subscription" => [
                        "id" => "f1c2a387-161a-49f9-a165-0f21d7a4e1c4",
                        "status" => "enabled",
                        "type" => "channel.subscription",
                        "version" => "1",
                        "cost" => 1,
                        "condition" => [
                            "broadcaster_user_id" => "12826"
                        ],
                        "transport" => [
                            "method" => "webhook",
                            "callback" => "https://example.com/webhooks/callback"
                        ],
                        "created_at" => "2019-11-16T10:11:12.634234626Z"
                    ],
                    "event" => [
                        "user_id" => "1337",
                        "user_login" => "danielhe4rt",
                        "user_name" => "danielhe4rt",
                        "broadcaster_user_id" => "12826",
                        "broadcaster_user_login" => "twitch",
                        "broadcaster_user_name" => "Twitch",
                        "followed_at" => "2020-07-15T18:16:11.17106713Z"
                    ],
                ],
                'expected' => [
                    'username' => 'danielhe4rt',
                    'provider' => 'twitch'
                ],
                'hasProvider' => true
            ]
        ];
    }
}
