<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
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
