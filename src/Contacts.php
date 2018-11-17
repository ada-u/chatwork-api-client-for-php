<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\HttpClient;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @package ChatWork\Api\Client
 */
final class Contacts
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
    public function getContactsAsync(): PromiseInterface
    {
        return $this->client->requestAsync('GET', 'contacts');
    }

    /**
     * @return ResponseInterface
     */
    public function getContacts(): ResponseInterface
    {
        return $this->getContactsAsync()->wait();
    }

}
