<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Sender;

class SenderTest extends TestCase
{
    /** @var Sender */
    protected $sender;

    public function setUp(): void
    {
        $this->sender = new Sender();
    }

    public function testSetInternalId()
    {
        $this->sender->setInternalId('test-123');

        $this->assertEquals('test-123', $this->sender->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->sender->setInternalReference('test-ABC');

        $this->assertEquals('test-ABC', $this->sender->internal_reference);
    }

    /** @test */
    public function testSetCompany()
    {
        $this->sender->setCompany('IBM Inc.');

        $this->assertEquals('IBM Inc.', $this->sender->company);
    }

    /** @test */
    public function testSetNameLine1()
    {
        $this->sender->setNameLine1('John Doe');

        $this->assertEquals('John Doe', $this->sender->name_line1);
    }

    /** @test */
    public function testSetNameLine2()
    {
        $this->sender->setNameLine2('C/O Accounting');

        $this->assertEquals('C/O Accounting', $this->sender->name_line2);
    }

    /** @test */
    public function testSetAddressLine1()
    {
        $this->sender->setAddressLine1('Corner Street 123');

        $this->assertEquals('Corner Street 123', $this->sender->address_line1);
    }

    /** @test */
    public function testSetAddressLine2()
    {
        $this->sender->setAddressLine2('3. floor');

        $this->assertEquals('3. floor', $this->sender->address_line2);
    }

    /** @test */
    public function testSetPostalCode()
    {
        $this->sender->setPostalCode('2100');

        $this->assertEquals('2100', $this->sender->postal_code);
    }

    /** @test */
    public function testSetCity()
    {
        $this->sender->setCity('Copenhagen');

        $this->assertEquals('Copenhagen', $this->sender->city);
    }

    /** @test */
    public function testSetState()
    {
        $this->sender->setState('Capital');

        $this->assertEquals('Capital', $this->sender->state);
    }

    /** @test */
    public function testSetCountry()
    {
        $this->sender->setCountry('DK');

        $this->assertEquals('DK', $this->sender->country);
    }

    /** @test */
    public function testSetSms()
    {
        $this->sender->setSms('+45 3027 4735');

        $this->assertEquals('+45 3027 4735', $this->sender->sms);
    }

    /** @test */
    public function testSetEmail()
    {
        $this->sender->setEmail('john@examle.com');

        $this->assertEquals('john@examle.com', $this->sender->email);
    }
}
