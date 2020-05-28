<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Agent;

class AgentTest extends TestCase
{
    /** @var Agent */
    protected $agent;

    public function setUp(): void
    {
        $this->agent = new Agent();
    }

    public function testSetInternalId()
    {
        $this->agent->setInternalId('test-123');

        $this->assertEquals('test-123', $this->agent->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->agent->setInternalReference('test-ABC');

        $this->assertEquals('test-ABC', $this->agent->internal_reference);
    }

    /** @test */
    public function testSetAgentNo()
    {
        $this->agent->setAgentNo('XY123');

        $this->assertEquals('XY123', $this->agent->agent_no);
    }

    /** @test */
    public function testSetCompany()
    {
        $this->agent->setCompany('IBM Inc.');

        $this->assertEquals('IBM Inc.', $this->agent->company);
    }

    /** @test */
    public function testSetNameLine1()
    {
        $this->agent->setNameLine1('John Doe');

        $this->assertEquals('John Doe', $this->agent->name_line1);
    }

    /** @test */
    public function testSetNameLine2()
    {
        $this->agent->setNameLine2('C/O Accounting');

        $this->assertEquals('C/O Accounting', $this->agent->name_line2);
    }

    /** @test */
    public function testSetAddressLine1()
    {
        $this->agent->setAddressLine1('Corner Street 123');

        $this->assertEquals('Corner Street 123', $this->agent->address_line1);
    }

    /** @test */
    public function testSetAddressLine2()
    {
        $this->agent->setAddressLine2('3. floor');

        $this->assertEquals('3. floor', $this->agent->address_line2);
    }

    /** @test */
    public function testSetPostalCode()
    {
        $this->agent->setPostalCode('2100');

        $this->assertEquals('2100', $this->agent->postal_code);
    }

    /** @test */
    public function testSetCity()
    {
        $this->agent->setCity('Copenhagen');

        $this->assertEquals('Copenhagen', $this->agent->city);
    }

    /** @test */
    public function testSetState()
    {
        $this->agent->setState('Capital');

        $this->assertEquals('Capital', $this->agent->state);
    }

    /** @test */
    public function testSetCountry()
    {
        $this->agent->setCountry('DK');

        $this->assertEquals('DK', $this->agent->country);
    }

    /** @test */
    public function testSetSms()
    {
        $this->agent->setSms('+45 3027 4735');

        $this->assertEquals('+45 3027 4735', $this->agent->sms);
    }

    /** @test */
    public function testSetEmail()
    {
        $this->agent->setEmail('john@examle.com');

        $this->assertEquals('john@examle.com', $this->agent->email);
    }
}
