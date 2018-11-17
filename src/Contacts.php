<?php

namespace ChatWork\Api\Client;

use ChatWork\Api\Client\Foundation\Credential\Credential;
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
