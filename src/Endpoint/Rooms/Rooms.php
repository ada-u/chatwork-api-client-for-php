<?php

namespace ChatWork\Api\Client\Endpoint\Rooms;

use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\CreateRoomRequestBody;
use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\UpdateRoomRequestBody;
use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @package ChatWork\Api\Client\Endpoint\Rooms
 */
final class Rooms
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @param Credential $credential
     * @param HttpClient $client
     */
    public function __construct(Credential $credential, HttpClient $client = null)
    {
        $this->client = $client ?: new HttpClient($credential);
    }

    /**
     * @return PromiseInterface
     */
    public function getRooms(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'rooms');
    }

    /**
     * @param CreateRoomRequestBody $body
     * @return PromiseInterface
     */
    public function createRoom(CreateRoomRequestBody $body): PromiseInterface
    {
        return $this->client->requestAsync('POST', 'rooms', [
            'form_params' => $body->normalize()
        ]);
    }

    /**
     * @param int $roomId
     * @return PromiseInterface
     */
    public function getRoom(int $roomId): PromiseInterface
    {
        return $this->client->requestAsync('GET', sprintf('rooms/%d', $roomId));
    }

    /**
     * @param int $roomId
     * @param UpdateRoomRequestBody $body
     * @return PromiseInterface
     */
    public function updateRoom(int $roomId, UpdateRoomRequestBody $body): PromiseInterface
    {
        return $this->client->requestAsync(
            'PUT',
            sprintf('rooms/%d', $roomId), [
                'form_params' => $body->normalize()
            ]
        );
    }

    /**
     * @param int $roomId
     * @return PromiseInterface
     */
    public function deleteRoom(int $roomId): PromiseInterface
    {
        return $this->client->requestAsync(
            'DELETE',
            sprintf('rooms/%d', $roomId), [
                'form_params' => [
                    'action_type' => 'delete'
                ]
            ]
        );
    }

    /**
     * @param int $roomId
     * @return PromiseInterface
     */
    public function getMembers(int $roomId): PromiseInterface
    {
        return $this->client->requestAsync(
            'GET',
            sprintf('rooms/%d/members', $roomId)
        );
    }

}
