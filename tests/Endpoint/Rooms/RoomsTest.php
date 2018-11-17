<?php

namespace ChatWork\Api\Client\Tests\Endpoint\Rooms;

use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\CreateRoomRequestBody;
use ChatWork\Api\Client\Endpoint\Rooms\Rooms;
use ChatWork\Api\Client\Foundation\Credential\ChatWorkToken;
use ChatWork\Api\Client\Tests\Endpoint\TestHelper;
use PHPUnit\Framework\TestCase;

final class RoomsTest extends TestCase
{
    use TestHelper;

    /**
     * @test
     */
    public function getRooms()
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $rooms->getRooms();

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function createRoom()
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $body = new CreateRoomRequestBody(
            'test room',
            'description',
            [$this->getMyAccountId()]
        );
        $response = $rooms->createRoom($body);

        $this->assertSame(200, $response->getStatusCode());
    }

}
