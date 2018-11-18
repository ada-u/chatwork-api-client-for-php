<?php

namespace ChatWork\Api\Client\Endpoint\My;

use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @package ChatWork\Api\Client
 */
final class My
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
    public function getMyStatus(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'my/status');
    }

    /**
     * @return PromiseInterface
     */
    public function getMyTasks(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'my/tasks/');
    }

}
