<?php

namespace SmartSendIo\Api\Adapters;

use GuzzleHttp\Client;
use SmartSendIo\Api\ApiResponse;
use SmartSendIo\Api\Contracts\ClientInterface;
use SmartSendIo\Api\Contracts\ApiResponseInterface;

class GuzzleClientAdapter implements ClientInterface
{
    protected $client;

    public function __construct(Client $guzzleClient)
    {
        $this->client = $guzzleClient;
    }

    public function get(string $uri, array $query = []): ApiResponseInterface
    {
        $response = $this->client->request('GET', $uri, [
            'http_errors' => false,
            'query' => $query,
        ]);

        return new ApiResponse($response);
    }

    public function post(string $uri, array $query = [], array $body = []): ApiResponseInterface
    {
        $response = $this->client->request('POST', $uri, [
            'http_errors' => false,
            'query' => $query,
            'json' => $body,
        ]);

        return new ApiResponse($response);
    }

    public function put(string $uri, array $query = [], array $body = []): ApiResponseInterface
    {
        $response = $this->client->request('PUT', $uri, [
            'http_errors' => false,
            'query' => $query,
            'json' => $body,
        ]);

        return new ApiResponse($response);
    }

    public function patch(string $uri, array $query = [], array $body = []): ApiResponseInterface
    {
        $response = $this->client->request('PATCH', $uri, [
            'http_errors' => false,
            'query' => $query,
            'json' => $body,
        ]);

        return new ApiResponse($response);
    }

    public function delete(string $uri, array $query = [], array $body = []): ApiResponseInterface
    {
        $response = $this->client->request('DELETE', $uri, [
            'http_errors' => false,
            'query' => $query,
        ]);

        return new ApiResponse($response);
    }
}
