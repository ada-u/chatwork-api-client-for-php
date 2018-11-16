<?php

namespace ChatWork\Api\Client\Tests;

use ChatWork\Api\Client\Me;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class MeTest extends TestCase
{

    /**
     * @test
     */
    public function getMeAsyncTest()
    {
        $me = new Me(getenv('CHATWORK_TOKEN'));
        $response = $me->getMyProfile();

        $this->assertSame(200, $response->getStatusCode());
    }
}
