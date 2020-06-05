<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Services;

class ServicesTest extends TestCase
{
    /** @var Services */
    protected $services;

    public function setUp(): void
    {
        $this->services = new Services();
    }

    /** @test */
    public function testSetEmailNotification()
    {
        $this->services->setEmailNotification('john@example.com');

        $this->assertEquals('john@example.com', $this->services->email_notification);
    }

    /** @test */
    public function testSetSmsNotification()
    {
        $this->services->setSmsNotification('30 27 47 35');

        $this->assertEquals('30 27 47 35', $this->services->sms_notification);
    }

    /** @test */
    public function testSetFlexDelivery()
    {
        $this->services->setFlexDelivery('Leave at doorstep');

        $this->assertEquals('Leave at doorstep', $this->services->flex_delivery);
    }
}
