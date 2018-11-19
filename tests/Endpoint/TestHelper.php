<?php

namespace ChatWork\Api\Client\Tests\Endpoint;

use ChatWork\Api\Client\Endpoint\Me\Me;
use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\CreateRoomRequestBody;
use ChatWork\Api\Client\Endpoint\Rooms\Rooms;
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

    /**
     * @return int
     */
    public function prepareRoom(): int
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $body = new CreateRoomRequestBody(
            'test room',
            'description',
            [$this->getMyAccountId()]
        );
        $response = $rooms->createRoom($body)->wait();

        return (int) \GuzzleHttp\json_decode($response->getBody()->getContents())->room_id;
    }

    /**
     * @param int $roomId
     */
    public function cleanRoom(int $roomId)
    {
        $rooms = new Rooms(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $rooms->deleteRoom($roomId)->wait();
    }
}
