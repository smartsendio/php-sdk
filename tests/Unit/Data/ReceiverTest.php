<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Receiver;

class ReceiverTest extends TestCase
{
    /** @var Receiver */
    protected $receiver;

    public function setUp(): void
    {
        $this->receiver = new Receiver();
    }

    public function testSetInternalId()
    {
        $this->receiver->setInternalId('test-123');

        $this->assertEquals('test-123', $this->receiver->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->receiver->setInternalReference('test-ABC');

        $this->assertEquals('test-ABC', $this->receiver->internal_reference);
    }

    /** @test */
    public function testSetCompany()
    {
        $this->receiver->setCompany('IBM Inc.');

        $this->assertEquals('IBM Inc.', $this->receiver->company);
    }

    /** @test */
    public function testSetNameLine1()
    {
        $this->receiver->setNameLine1('John Doe');

        $this->assertEquals('John Doe', $this->receiver->name_line1);
    }

    /** @test */
    public function testSetNameLine2()
    {
        $this->receiver->setNameLine2('C/O Accounting');

        $this->assertEquals('C/O Accounting', $this->receiver->name_line2);
    }

    /** @test */
    public function testSetAddressLine1()
    {
        $this->receiver->setAddressLine1('Corner Street 123');

        $this->assertEquals('Corner Street 123', $this->receiver->address_line1);
    }

    /** @test */
    public function testSetAddressLine2()
    {
        $this->receiver->setAddressLine2('3. floor');

        $this->assertEquals('3. floor', $this->receiver->address_line2);
    }

    /** @test */
    public function testSetPostalCode()
    {
        $this->receiver->setPostalCode('2100');

        $this->assertEquals('2100', $this->receiver->postal_code);
    }

    /** @test */
    public function testSetCity()
    {
        $this->receiver->setCity('Copenhagen');

        $this->assertEquals('Copenhagen', $this->receiver->city);
    }

    /** @test */
    public function testSetState()
    {
        $this->receiver->setState('Capital');

        $this->assertEquals('Capital', $this->receiver->state);
    }

    /** @test */
    public function testSetCountry()
    {
        $this->receiver->setCountry('DK');

        $this->assertEquals('DK', $this->receiver->country);
    }

    /** @test */
    public function testSetSms()
    {
        $this->receiver->setSms('+45 3027 4735');

        $this->assertEquals('+45 3027 4735', $this->receiver->sms);
    }

    /** @test */
    public function testSetEmail()
    {
        $this->receiver->setEmail('john@examle.com');

        $this->assertEquals('john@examle.com', $this->receiver->email);
    }
}
