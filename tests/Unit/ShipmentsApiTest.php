<?php

namespace SmartSendIo\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartSendIo\Api\Contracts\ClientInterface;
use SmartSendIo\Api\Contracts\ApiResponseInterface;
use SmartSendIo\Api\Data\Shipment;
use SmartSendIo\Api\ShipmentApi;

class ShipmentsApiTest extends TestCase
{
    /** @test */
    public function testCanBookShipment()
    {
        $shipment = \Mockery::mock(Shipment::class);
        $shipment->shouldReceive("toArray")->andReturn(['test']);

        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive("post")
            ->with('https://app.smartsend.io/api/v1/website/example.com/shipments/', ['api_token' => 'TEST-1234'], ['test'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $api = new ShipmentApi($client);
        $api->website('example.com');
        $api->token('TEST-1234');
        $this->assertInstanceOf(ApiResponseInterface::class, $api->book($shipment));
    }
}
