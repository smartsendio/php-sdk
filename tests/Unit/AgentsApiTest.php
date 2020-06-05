<?php

namespace Smartsendio\Api\Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Smartsendio\Api\AgentApi;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;

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
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Website is required');

            $this->websiteIsRequiredWhenFindingAgentById();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->websiteIsRequiredWhenFindingAgentById();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Website is required', $exception->getMessage());
            }
        }
    }

    private function websiteIsRequiredWhenFindingAgentById()
    {
        $response = (new AgentApi($this->client))
            // No website set
            ->token('TEST-1234')
            ->find('123');
    }

    /** @test */
    public function testTokenIsRequiresWhenFindingAgentById()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Token is required');

            $this->tokenIsRequiresWhenFindingAgentById();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->tokenIsRequiresWhenFindingAgentById();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Token is required', $exception->getMessage());
            }
        }
    }

    private function tokenIsRequiresWhenFindingAgentById()
    {
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
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Website is required');

            $this->websiteIsRequiredWhenLookingByAgentNumber();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->websiteIsRequiredWhenLookingByAgentNumber();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Website is required', $exception->getMessage());
            }
        }
    }

    private function websiteIsRequiredWhenLookingByAgentNumber()
    {
        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testTokenIsRequiredWhenLookingByAgentNumber()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Token is required');

            $this->tokenIsRequiredWhenLookingByAgentNumber();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->tokenIsRequiredWhenLookingByAgentNumber();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Token is required', $exception->getMessage());
            }
        }
    }

    private function tokenIsRequiredWhenLookingByAgentNumber()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testCarrierIsRequiredWhenLookingByAgentNumber()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Carrier is required');

            $this->carrierIsRequiredWhenLookingByAgentNumber();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->carrierIsRequiredWhenLookingByAgentNumber();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Carrier is required', $exception->getMessage());
            }
        }
    }

    private function carrierIsRequiredWhenLookingByAgentNumber()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->lookup('123');
    }

    /** @test */
    public function testCountryIsRequiredWhenLookingByAgentNumber()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Country is required');

            $this->countryIsRequiredWhenLookingByAgentNumber();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->countryIsRequiredWhenLookingByAgentNumber();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Country is required', $exception->getMessage());
            }
        }
    }

    private function countryIsRequiredWhenLookingByAgentNumber()
    {
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
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Website is required');

            $this->websteIsRequiredWhenListingAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->websteIsRequiredWhenListingAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Website is required', $exception->getMessage());
            }
        }
    }

    private function websteIsRequiredWhenListingAgents()
    {
        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testTokenIsRequiredWhenListingAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Token is required');

            $this->tokenIsRequiredWhenListingAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->tokenIsRequiredWhenListingAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Token is required', $exception->getMessage());
            }
        }
    }

    private function tokenIsRequiredWhenListingAgents()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testCarrierIsRequiredWhenListingAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Carrier is required');

            $this->carrierIsRequiredWhenListingAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->carrierIsRequiredWhenListingAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Carrier is required', $exception->getMessage());
            }
        }
    }

    private function carrierIsRequiredWhenListingAgents()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->get();
    }

    /** @test */
    public function testCountryIsRequiredWhenListingAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Country is required');

            $this->countryIsRequiredWhenListingAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->countryIsRequiredWhenListingAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Country is required', $exception->getMessage());
            }
        }
    }

    private function countryIsRequiredWhenListingAgents()
    {
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
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Website is required');

            $this->websiteIsRequiredWhenSearchingForClosestAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->websiteIsRequiredWhenSearchingForClosestAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Website is required', $exception->getMessage());
            }
        }
    }

    private function websiteIsRequiredWhenSearchingForClosestAgents()
    {
        (new AgentApi($this->client))
            // No website
            ->token('TEST-1234')
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testTokenIsRequiredWhenSearchingForClosestAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Token is required');

            $this->tokenIsRequiredWhenSearchingForClosestAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->tokenIsRequiredWhenSearchingForClosestAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Token is required', $exception->getMessage());
            }
        }
    }

    private function tokenIsRequiredWhenSearchingForClosestAgents()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            // No token
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testCarrierIsRequiredWhenSearchingForClosestAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Carrier is required');

            $this->carrierIsRequiredWhenSearchingForClosestAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->carrierIsRequiredWhenSearchingForClosestAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Carrier is required', $exception->getMessage());
            }
        }
    }

    private function carrierIsRequiredWhenSearchingForClosestAgents()
    {
        (new AgentApi($this->client))
            ->website('example.com')
            ->token('TEST-1234')
            ->country('DK')
            ->closest();
    }

    /** @test */
    public function testCountryIsRequiredWhenSearchingForClosestAgents()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectErrorMessage('Country is required');

            $this->countryIsRequiredWhenSearchingForClosestAgents();
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $this->countryIsRequiredWhenSearchingForClosestAgents();
            } catch (\Exception $exception) {
                $this->assertInstanceOf(InvalidArgumentException::class, $exception);
                $this->assertEquals('Country is required', $exception->getMessage());
            }
        }
    }

    private function countryIsRequiredWhenSearchingForClosestAgents()
    {
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
