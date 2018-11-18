<?php

namespace ChatWork\Api\Client\Tests\Endpoint\My;

use ChatWork\Api\Client\Endpoint\My\My;
use ChatWork\Api\Client\Foundation\Credential\ChatWorkToken;
use PHPUnit\Framework\TestCase;

final class MyTest extends TestCase
{

    /**
     * @test
     */
    public function getMyStatusStatus()
    {
        $my = new My(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $my->getMyStatus()->wait();

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function getMyTasks()
    {
        $my = new My(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $my->getMyTasks()->wait();

        $this->assertTrue(
            in_array($response->getStatusCode(), [200, 204], true),
            'chatwork api responds with 204 status code if you dont have any tasks'
        );
    }
}
