<?php

namespace Smartsendio\Api\Tests\Unit\Data\Responses;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Responses\AgentResponse;

class AgentResponseTest extends TestCase
{
    /** @var AgentResponse */
    protected $agentResponse;

    public function setUp(): void
    {
        $this->agentResponse = AgentResponse::make([
            'id' => 1,
            'type' => 'agent',
            'agent_no' => 'pTOt5PaOYD',
            'carrier' => 'bring',
            'distance' => 1.23,
            'company' => 'Herzog-Lowe',
            'name_line1' => 'Name',
            'name_line2' => 'Jones',
            'address_line1' => '998 Ledner Key',
            'address_line2' => 'Falls',
            'postal_code' => '29580-6498',
            'city' => 'Brakusfort',
            'country' => 'dk',
            'coordinates' => [
                'latitude' => 19.817213,
                'longitude' => 135.326348
            ],
            'opening_hours' => [
                [
                    'day' => 'tuesday',
                    'opens' => '08:30:00',
                    'closes' => '17:15:00'
                ],
            ],
        ]);
    }

    public function testId()
    {
        $this->assertEquals('1', $this->agentResponse->id);
    }

    public function testType()
    {
        $this->assertEquals('agent', $this->agentResponse->type);
    }

    public function testAgentNo()
    {
        $this->assertEquals('pTOt5PaOYD', $this->agentResponse->agent_no);
    }

    public function testCarrier()
    {
        $this->assertEquals('bring', $this->agentResponse->carrier);
    }

    public function testDistance()
    {
        $this->assertEquals(1.23, $this->agentResponse->distance);
    }

    public function testCompany()
    {
        $this->assertEquals('Herzog-Lowe', $this->agentResponse->company);
    }

    public function testNameLine1()
    {
        $this->assertEquals('Name', $this->agentResponse->name_line1);
    }

    public function testNameLine2()
    {
        $this->assertEquals('Jones', $this->agentResponse->name_line2);
    }

    public function testAddressLine1()
    {
        $this->assertEquals('998 Ledner Key', $this->agentResponse->address_line1);
    }

    public function testAddressLine2()
    {
        $this->assertEquals('Falls', $this->agentResponse->address_line2);
    }

    public function testPostalCode()
    {
        $this->assertEquals('29580-6498', $this->agentResponse->postal_code);
    }

    public function testCity()
    {
        $this->assertEquals('Brakusfort', $this->agentResponse->city);
    }

    public function testCountry()
    {
        $this->assertEquals('dk', $this->agentResponse->country);
    }

    public function testCoordinates()
    {
        $this->assertTrue(true); // Not yet implemented
    }

    public function testOpeningHours()
    {
        $this->assertTrue(true); // Not yet implemented
    }
}
