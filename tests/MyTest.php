<?php

namespace ChatWork\Api\Client\Tests;

use ChatWork\Api\Client\My;
use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{

    /**
     * @test
     */
    public function getMyStatusStatus()
    {
        $my = new My(getenv('CHATWORK_TOKEN'));
        $response = $my->getMyStatus();

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function getMyTasks()
    {
        $my = new My(getenv('CHATWORK_TOKEN'));
        $response = $my->getMyTasks();

        $this->assertTrue(
            in_array($response->getStatusCode(), [200, 204], true),
            'chatwork api responds with 204 status code if you dont have any task'
        );
    }
}
