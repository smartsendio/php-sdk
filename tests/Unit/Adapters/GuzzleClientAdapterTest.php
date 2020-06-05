<?php

namespace Smartsendio\Api\Tests\Unit\Adapters;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Smartsendio\Api\Adapters\GuzzleClientAdapter;
use Smartsendio\Api\ApiResponse;

class GuzzleClientAdapterTest extends TestCase
{
    /** @var Client */
    protected $client;

    /** @var GuzzleClientAdapter */
    protected $adapter;

    public function setUp(): void
    {
        $this->client = \Mockery::mock(Client::class);

        $this->adapter = new GuzzleClientAdapter($this->client);
    }

    /** @test */
    public function testGetCallsGuzzle(): void
    {
        $this->client->shouldReceive('request')
            ->with(
                'GET',
                'https://example.com',
                [
                    'http_errors' => false,
                    'query' => [
                        'param1' => '1234',
                    ],
                ]
            )->andReturn(\Mockery::mock(ResponseInterface::class));

        $response = $this->adapter->get('https://example.com', ['param1' => '1234']);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /** @test */
    public function testPostCallsGuzzle(): void
    {
        $this->client->shouldReceive('request')
            ->with(
                'POST',
                'https://example.com',
                [
                    'http_errors' => false,
                    'query' => [
                        'param1' => '1234',
                    ], 'json' => [
                        'param2' => 'ABCD',
                    ],
                ]
            )->andReturn(\Mockery::mock(ResponseInterface::class));

        $response = $this->adapter->post('https://example.com', ['param1' => '1234'], ['param2' => 'ABCD']);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /** @test */
    public function testPutCallsGuzzle(): void
    {
        $this->client->shouldReceive('request')
            ->with(
                'PUT',
                'https://example.com',
                [
                    'http_errors' => false,
                    'query' => [
                        'param1' => '1234',
                    ],
                    'json' => [
                        'param2' => 'ABCD',
                    ],
                ]
            )->andReturn(\Mockery::mock(ResponseInterface::class));

        $response = $this->adapter->put('https://example.com', ['param1' => '1234'], ['param2' => 'ABCD']);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /** @test */
    public function testPatchCallsGuzzle(): void
    {
        $this->client->shouldReceive('request')
            ->with(
                'PATCH',
                'https://example.com',
                [
                    'http_errors' => false,
                    'query' => [
                        'param1' => '1234',
                    ],
                    'json' => [
                        'param2' => 'ABCD',
                    ],
                ]
            )->andReturn(\Mockery::mock(ResponseInterface::class));

        $response = $this->adapter->patch('https://example.com', ['param1' => '1234'], ['param2' => 'ABCD']);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /** @test */
    public function testDeleteCallsGuzzle(): void
    {
        $this->client->shouldReceive('request')
            ->with(
                'DELETE',
                'https://example.com',
                [
                    'http_errors' => false,
                    'query' => [
                        'param1' => '1234',
                    ]
                ]
            )->andReturn(\Mockery::mock(ResponseInterface::class));

        $response = $this->adapter->delete('https://example.com', ['param1' => '1234']);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
