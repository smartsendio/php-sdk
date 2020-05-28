<?php

namespace Unit;

namespace SmartSendIo\Api\Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use SmartSendIo\Api\ApiResponse;
use SmartSendIo\Api\Contracts\ApiErrorInterface;

class ApiResponseTest extends TestCase
{
    //======================================================================
    // IsSuccessful
    //======================================================================

    /** @test */
    public function testHttp200ReturnsIsSuccessful(): void
    {
        // Http status 200: Everything should be okay
        $response = new ApiResponse(new Response(200));
        $this->assertTrue($response->isSuccessful());
    }

    /** @test */
    public function testHttp400ReturnsIsNotSuccessful(): void
    {
        // Http status 400: Bad request
        $response = new ApiResponse(new Response(400));
        $this->assertFalse($response->isSuccessful());
    }

    /** @test */
    public function testHttp401ReturnsIsNotSuccessful(): void
    {
        // Http status 401: Authentication information is missing or invalid
        $response = new ApiResponse(new Response(401));
        $this->assertFalse($response->isSuccessful());
    }

    /** @test */
    public function testHttp403ReturnsIsNotSuccessful(): void
    {
        // Http status 403: Forbidden. You are authenticated, but doers not have authorization to perform the action.
        $response = new ApiResponse(new Response(403));
        $this->assertFalse($response->isSuccessful());
    }

    /** @test */
    public function testHttp404ReturnsIsNotSuccessful(): void
    {
        // Http status 404: Resource not found, invalid information provided.
        $response = new ApiResponse(new Response(404));
        $this->assertFalse($response->isSuccessful());
    }

    //======================================================================
    // getResponse
    //======================================================================

    /** @test */
    public function testReturnsPsrResponse(): void
    {
        $psrResponse = new Response(200);
        $response = new ApiResponse($psrResponse);
        $this->assertSame($psrResponse, $response->getResponse());
    }

    //======================================================================
    // Data
    //======================================================================

    /** @test */
    public function testHasDataReturnsTrueWhenDataReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['data' => 'value']));
        $response = new ApiResponse($psrResponse);

        $this->assertTrue($response->hasData());
    }

    /** @test */
    public function testHasDataReturnsFalseWhenNoDataReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-data-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasData());
    }

    /** @test */
    public function testGetThrowsExceptionForMissingData(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-data-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\RuntimeException::class);

            $response->getData(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getData(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\RuntimeException::class, $exception);
            }
        }
    }

    /** @test */
    public function testReturnsDataFromResponse(): void
    {
        $psrResponse = new Response(200, [], json_encode(['data' => ['field1' => 'valueA', 'field2' => 'valueB']]));
        $response = new ApiResponse($psrResponse);

        $data = $response->getData();

        $this->assertEquals(['field1' => 'valueA', 'field2' => 'valueB'], $data);
    }

    //======================================================================
    // Errors
    //======================================================================

    /** @test */
    public function testReturnsErrorFromResponse(): void
    {
        $psrResponse = new Response(200, [], json_encode(['error' => ['field1' => 'valueA', 'field2' => 'valueB']]));
        $response = new ApiResponse($psrResponse);

        $this->assertInstanceOf(ApiErrorInterface::class, $response->getError());
    }
}
