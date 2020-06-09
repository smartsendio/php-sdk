<?php

namespace Smartsendio\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Contracts\BookingApiResponseInterface;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;
use Smartsendio\Api\Data\Shipment;
use Smartsendio\Api\BookingApi;

class BookingApiTest extends TestCase
{
    /** @test */
    public function testCanBookShipment()
    {
        $shipment = \Mockery::mock(Shipment::class);
        $shipment->shouldReceive("toArray")->andReturn(['test']);

        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive("post")
            ->with(
                'https://app.smartsend.io/api/v1/website/example.com/labels/',
                [
                    'api_token' => 'TEST-1234',
                ],
                [
                    'test',
                ]
            )->andReturn(\Mockery::mock(BookingApiResponseInterface::class));

        $api = new BookingApi($client);
        $api->website('example.com');
        $api->token('TEST-1234');
        $this->assertInstanceOf(ApiResponseInterface::class, $api->shipment($shipment));
    }
}
