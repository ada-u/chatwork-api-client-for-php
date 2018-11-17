<?php

namespace ChatWork\Api\Client\Tests\Endpoint\Me;

use ChatWork\Api\Client\Endpoint\Me\Me;
use ChatWork\Api\Client\Foundation\Credential\ChatWorkToken;
use PHPUnit\Framework\TestCase;

class MeTest extends TestCase
{

    /**
     * @test
     */
    public function getMe()
    {
        $me = new Me(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $me->getMyProfile();

        $this->assertSame(200, $response->getStatusCode());
    }
}
