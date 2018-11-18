<?php

namespace ChatWork\Api\Client\Tests\Endpoint;

use ChatWork\Api\Client\Endpoint\Me\Me;
use ChatWork\Api\Client\Foundation\Credential\ChatWorkToken;

trait TestHelper
{
    /**
     * @return int
     */
    public function getMyAccountId(): int
    {
        $me = new Me(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $me->getMyProfile()->wait();

        return (int) \GuzzleHttp\json_decode($response->getBody()->getContents())->account_id;
    }
}
