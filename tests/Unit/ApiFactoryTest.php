<?php

namespace SmartSendIo\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartSendIo\Api\ApiFactory;
use SmartSendIo\Api\Contracts\AgentApiInterface;
use SmartSendIo\Api\Contracts\ClientInterface;
use SmartSendIo\Api\Contracts\ShipmentsApiInterface;

class ApiFactoryTest extends TestCase
{
    protected $factory;

    public function setUp(): void
    {
        $this->factory = new ApiFactory(\Mockery::mock(ClientInterface::class));
    }

    /** @test */
    public function testCanResolveAgentsApi()
    {
        $this->assertInstanceOf(AgentApiInterface::class, $this->factory->agents());
    }

    /** @test */
    public function testCanResolveShipmentsApi()
    {
        $this->assertInstanceOf(ShipmentsApiInterface::class, $this->factory->shipments());
    }
}
