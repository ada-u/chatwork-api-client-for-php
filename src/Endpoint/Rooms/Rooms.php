<?php

namespace ChatWork\Api\Client\Endpoint\Rooms;

use ChatWork\Api\Client\Endpoint\Rooms\RequestBody\CreateRoomRequestBody;
use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

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
    public function getRoomsAsync(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'rooms');
    }

    /**
     * @return ResponseInterface
     */
    public function getRooms(): ResponseInterface
    {
        return $this->getRoomsAsync()->wait();
    }

    /**
     * @param CreateRoomRequestBody $body
     * @return PromiseInterface
     */
    public function createRoomAsync(CreateRoomRequestBody $body): PromiseInterface
    {
        return $this->client->requestAsync('POST', 'rooms', [
            'form_params' => $body->normalize()
        ]);
    }

    /**
     * @param CreateRoomRequestBody $body
     * @return ResponseInterface
     */
    public function createRoom(CreateRoomRequestBody $body): ResponseInterface
    {
        return $this->createRoomAsync($body)->wait();
    }

}
