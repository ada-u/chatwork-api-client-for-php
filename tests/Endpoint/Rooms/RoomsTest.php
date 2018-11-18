<?php

namespace ChatWork\Api\Client\Tests\Endpoint\Rooms;

use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\CreateRoomRequestBody;
use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\RoomIcon;
use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\UpdateRoomRequestBody;
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
        $response = $rooms->getRooms()->wait();

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
        $response = $rooms->createRoom($body)->wait();

        $this->assertSame(200, $response->getStatusCode());

        return (int) \GuzzleHttp\json_decode($response->getBody()->getContents())->room_id;
    }

    /**
     * @depends createRoom
     * @test
     * @param int $roomId
     * @return int
     */
    public function getRoom(int $roomId)
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $rooms->getRoom($roomId)->wait();

        $this->assertSame(200, $response->getStatusCode());

        return (int) \GuzzleHttp\json_decode($response->getBody()->getContents())->room_id;
    }

    /**
     * @depends getRoom
     * @test
     * @param int $roomId
     * @return int
     */
    public function updateRoom(int $roomId)
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $body = new UpdateRoomRequestBody(
            'test room',
            'description',
            RoomIcon::BEER
        );
        $response = $rooms->updateRoom($roomId, $body)->wait();

        $this->assertSame(200, $response->getStatusCode());

        return (int) \GuzzleHttp\json_decode($response->getBody()->getContents())->room_id;
    }

    /**
     * @depends updateRoom
     * @test
     * @param int $roomId
     */
    public function deleteRoom(int $roomId)
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $rooms->deleteRoom($roomId)->wait();

        $this->assertSame(204, $response->getStatusCode());
    }

}
