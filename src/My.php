<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\Credential\Credential;
use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

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
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyStatusAsync(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'my/status');
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyTasksAsync(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'my/tasks/');
    }

    /**
     * @return ResponseInterface
     */
    public function getMyStatus(): ResponseInterface
    {
        return $this->getMyStatusAsync()->wait();
    }

    /**
     * @return ResponseInterface
     */
    public function getMyTasks(): ResponseInterface
    {
        return $this->getMyTasksAsync()->wait();
    }

}
