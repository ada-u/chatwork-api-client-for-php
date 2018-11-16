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
        $httpClient = new Client([
            'base_uri' => 'https://api.chatwork.com/v2/',
            'timeout'  => 5.0,
        ]);

        $me = new Me($httpClient, getenv('CHATWORK_TOKEN'));
        $response = $me->getMyProfile();

        $this->assertSame(200, $response->getStatusCode());
    }
}
