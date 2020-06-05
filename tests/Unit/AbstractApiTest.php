<?php

namespace Smartsendio\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\AbstractApi;

class AbstractApiTest extends TestCase
{
    /** @test */
    public function testDemoIsDeactivatedPerDefault()
    {
        $api = \Mockery::mock(AbstractApi::class)->makePartial();
        $api->shouldReceive('getVersion')->andReturn('1');

        $this->assertFalse($api->demo);
        $this->assertEquals('https://app.smartsend.io/api/v1/testing/', $api->getBaseUri('testing'));
    }

    /** @test */
    public function testDemoIsIncludeInUriWhenEnabled()
    {
        $api = \Mockery::mock(AbstractApi::class)->makePartial();
        $api->shouldReceive('getVersion')->andReturn('1');

        $api->demo();

        $this->assertTrue($api->demo);
        $this->assertEquals('https://app.smartsend.io/api/v1/demo/testing/', $api->getBaseUri('testing'));
    }

    /** @test */
    public function testDemoIsNotIncludeInUriWhenDisabled()
    {
        $api = \Mockery::mock(AbstractApi::class)->makePartial();
        $api->shouldReceive('getVersion')->andReturn('1');

        $api->demo(false);

        $this->assertFalse($api->demo);
        $this->assertEquals('https://app.smartsend.io/api/v1/testing/', $api->getBaseUri('testing'));
    }
}
