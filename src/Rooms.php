<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

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
     * @return \GuzzleHttp\Promise\PromiseInterface
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

}
