<?php

namespace SmartSendIo\Api\Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SmartSendIo\Api\AgentApi;
use SmartSendIo\Api\Contracts\ClientInterface;
use SmartSendIo\Api\Contracts\ApiResponseInterface;

class AgentsApiTest extends TestCase
{
    /** @var ClientInterface */
    protected $client;

    public function setUp(): void
    {
        $this->client = \Mockery::mock(ClientInterface::class);
    }

    //======================================================================
    // USING ID
    //======================================================================

    /** @test */
    public function testFindAgentById()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/123/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->find('123');

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    /** @test */
    public function testWebsiteIsRequiredWhenFindingAgentById()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Website is required');

        $response = (new AgentApi($this->client))
            // No website set
            ->token('TEST-1234')
            ->find('123');
    }

    /** @test */
    public function testTokenIsRequiresWhenFindingAgentById()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Token is required');

        $response = (new AgentApi($this->client))
            ->website('example.com')
            // No token set
            ->find('123');
    }

    //======================================================================
    // USING AGENT NUMBER
    //======================================================================

    /** @test */
    public function testCanLookupAgentByAgentNumber()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/carrier/TESTDK/country/DK/agentno/123/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->lookup('123');

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    /** @test */
    public function testWebsiteIsRequiredWhenLookingByAgentNumber()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Website is required');

        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testTokenIsRequiredWhenLookingByAgentNumber()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Token is required');

        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testCarrierIsRequiredWhenLookingByAgentNumber()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Carrier is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testCountryIsRequiredWhenLookingByAgentNumber()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Country is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->lookup('123');
    }

    //======================================================================
    // LISTING
    //======================================================================

    /** @test */
    public function testWebsteIsRequiredWhenListingAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Website is required');

        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testTokenIsRequiredWhenListingAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Token is required');

        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testCarrierIsRequiredWhenListingAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Carrier is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testCountryIsRequiredWhenListingAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Country is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->get();
    }

    /** @test */
    public function testCanListAgentsForCarrierInCountry()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/carrier/TESTDK/country/DK/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->get();

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    /** @test */
    public function testCanListAgentsForCarrierInCountryPostalcode()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/carrier/TESTDK/country/DK/postalcode/2100/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->postalcode('2100')
            ->get();

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    /** @test */
    public function testCanListAgentsForCarrierInCountryPostalcodeStreet()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/carrier/TESTDK/country/DK/postalcode/2100/street/some street/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->postalcode('2100')
            ->street('some street')
            ->get();

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    //======================================================================
    // CLOSEST
    //======================================================================

    /** @test */
    public function testWebsiteIsRequiredWhenSearchingForClosestAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Website is required');

        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testTokenIsRequiredWhenSearchingForClosestAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Token is required');

        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testCarrierIsRequiredWhenSearchingForClosestAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Carrier is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testCountryIsRequiredWhenSearchingForClosestAgents()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Country is required');

        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->closest();
    }

    /** @test */
    public function testCanFindClosestAgentsForCarrierInCountryPostalcode()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/closest/carrier/TESTDK/country/DK/postalcode/2100/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->postalcode('2100')
            ->closest();

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }

    /** @test */
    public function testCanFindClosestAgentsForCarrierInCountryPostalcodeStreet()
    {
        $this->client->shouldReceive('get')
            ->with('https://app.smartsend.io/api/v1/website/example.com/agents/closest/carrier/TESTDK/country/DK/postalcode/2100/street/some street/', ['api_token' => 'TEST-1234'])
            ->andReturn(\Mockery::mock(ApiResponseInterface::class));

        $response = (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->carrier('TESTDK')
            ->country('DK')
            ->postalcode('2100')
            ->street('some street')
            ->closest();

        $this->assertInstanceOf(ApiResponseInterface::class, $response);
    }
}
