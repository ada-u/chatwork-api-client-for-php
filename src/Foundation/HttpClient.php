<?php

namespace ChatWork\Api\Client\Foundation;

use ChatWork\Api\Client\Foundation\Credential\Credential;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;

final class HttpClient
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @todo oauth2
     * @param Credential $credential
     */
    public function __construct(Credential $credential)
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://api.chatwork.com/v2/',
            'timeout'  => 5.0,
            'headers' => [
                'X-ChatWorkToken' => $credential->getValue()
            ]
        ]);
    }

    /**
     * Create and send an asynchronous HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well. Use an array to provide a URL
     * template and additional variables to use in the URL template expansion.
     *
     * @param string              $method  HTTP method
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     *
     * @return PromiseInterface
     */
    public function requestAsync(string $method, string $uri, array $options = [])
    {
        return $this->httpClient->requestAsync($method, $uri, $options);
    }

}
