<?php

namespace Smartsendio\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\ApiFactory;
use Smartsendio\Api\Contracts\AgentApiInterface;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Contracts\ShipmentsApiInterface;

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
