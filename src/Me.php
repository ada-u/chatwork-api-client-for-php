<?php

namespace ChatWork\Api\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @package ChatWork\Api\Client
 */
final class Me
{

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var string
     */
    private $token;

    /**
     * @param ClientInterface $httpClient
     * @param string $token
     */
    public function __construct(ClientInterface $httpClient, string $token)
    {
        $this->httpClient = $httpClient;
        $this->token = $token;
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyProfileAsync(): PromiseInterface
    {
        return $this->httpClient->requestAsync('GET', 'me', [
            'headers' => [
                'X-ChatWorkToken' => $this->token
            ]
        ]);
    }

    /**
     * @return ResponseInterface
     */
    public function getMyProfile(): ResponseInterface
    {
        return $this->getMyProfileAsync()->wait();
    }

}
