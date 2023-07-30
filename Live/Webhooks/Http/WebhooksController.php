<?php

namespace Live\Webhooks\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Live\Webhooks\Enums\SubscriptionProvidersEnum;

class WebhooksController extends Controller
{
    public function postWebhooks(
        Request $request,
        SubscriptionProvidersEnum $provider,
    ): Response
    {

        $challengeResponse = $request->input($provider->getChallengeKey());
        if ($challengeResponse) {
            return response($challengeResponse);
        }

        $webhookHandler->byProvider($provider, $request->all());

        return response()->noContent();
    }
}
