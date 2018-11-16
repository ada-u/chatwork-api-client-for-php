<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @package ChatWork\Api\Client
 */
final class Me
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @param string $token
     * @param HttpClient $client
     */
    public function __construct(string $token, HttpClient $client = null)
    {
        $this->client = $client ?: new HttpClient($token);
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyProfileAsync(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'me');
    }

    /**
     * @return ResponseInterface
     */
    public function getMyProfile(): ResponseInterface
    {
        return $this->getMyProfileAsync()->wait();
    }

}
