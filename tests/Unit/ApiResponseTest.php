<?php

namespace Unit;

namespace Smartsendio\Api\Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Smartsendio\Api\ApiResponse;
use Smartsendio\Api\Contracts\ApiErrorInterface;

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
    public function testHasDataReturnsFalseWhenEmptyDataReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['data' => null]));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasData());
    }

    /** @test */
    public function testGetDecodedDataThrowsExceptionWhenNoData(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-data-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getDecodedData(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getDecodedData(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetDecodedDataThrowsExceptionWhenEmptyData(): void
    {
        $psrResponse = new Response(200, [], json_encode(['data' => null]));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getDecodedData(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getDecodedData(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetDecodedDataFromResponse(): void
    {
        $psrResponse = new Response(200, [], json_encode(['data' => ['field1' => 'valueA', 'field2' => 'valueB']]));
        $response = new ApiResponse($psrResponse);

        $data = $response->getDecodedData();

        $this->assertEquals(['field1' => 'valueA', 'field2' => 'valueB'], $data);
    }

    //======================================================================
    // Links
    //======================================================================

    /** @test */
    public function testHasLinkReturnsTrueWhenLinksReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => ['link1' => 'value']]));
        $response = new ApiResponse($psrResponse);

        $this->assertTrue($response->hasLinks());
    }

    /** @test */
    public function testHasLinksReturnsFalseWhenNoLinksReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-links-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasLinks());
    }

    /** @test */
    public function testHasLinksReturnsFalseWhenEmptyLinksReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => null]));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasLinks());
    }

    /** @test */
    public function testHasLinksReturnsFalseWhenEmptyLinksArrayReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => []]));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasLinks());
    }

    /** @test */
    public function testGetLinksThrowsExceptionWhenNoLinks(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-links-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getLinks(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getLinks(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetLinksThrowsExceptionWhenEmptyLinks(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => null]));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getLinks(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getLinks(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetLinksThrowsExceptionWhenEmptyLinksArray(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => []]));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getLinks(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getLinks(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetLinksFromResponse(): void
    {
        $psrResponse = new Response(200, [], json_encode(['links' => ['link1' => 'valueA', 'link2' => 'valueB']]));
        $response = new ApiResponse($psrResponse);

        $data = $response->getLinks();

        $this->assertEquals(['link1' => 'valueA', 'link2' => 'valueB'], $data);
    }

    //======================================================================
    // Meta
    //======================================================================

    /** @test */
    public function testHasMetaReturnsTrueWhenMetaReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['meta' => ['field' => 'value']]));
        $response = new ApiResponse($psrResponse);

        $this->assertTrue($response->hasMeta());
    }

    /** @test */
    public function testHasMetaReturnsFalseWhenNoMetaReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-meta-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasMeta());
    }

    /** @test */
    public function testHasMetaReturnsFalseWhenEmptyMetaArrayReturned(): void
    {
        $psrResponse = new Response(200, [], json_encode(['meta' => []]));
        $response = new ApiResponse($psrResponse);

        $this->assertFalse($response->hasMeta());
    }

    /** @test */
    public function testGetMetaFromResponse(): void
    {
        $psrResponse = new Response(200, [], json_encode(['meta' => ['field1' => 'valueA', 'field2' => 'valueB']]));
        $response = new ApiResponse($psrResponse);

        $meta = $response->getMeta();

        $this->assertEquals(['field1' => 'valueA', 'field2' => 'valueB'], $meta);
    }

    /** @test */
    public function testGetMetaThrowsExceptionWhenNoMeta(): void
    {
        $psrResponse = new Response(200, [], json_encode(['not-meta-field' => 'value']));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getMeta(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getMeta(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetMetaThrowsExceptionWhenEmptyMeta(): void
    {
        $psrResponse = new Response(200, [], json_encode(['meta' => null]));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getMeta(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getMeta(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
    }

    /** @test */
    public function testGetMetaThrowsExceptionWhenEmptyMetaArray(): void
    {
        $psrResponse = new Response(200, [], json_encode(['meta' => []]));
        $response = new ApiResponse($psrResponse);

        if (method_exists($this, 'expectException')) {
            $this->expectException(\OutOfBoundsException::class);

            $response->getMeta(); // This should throw an exception
        } else {
            // The methods above was introduced in PHPUnit 8.4 which require PHP 7.2
            try {
                $response->getMeta(); // This should throw an exception
            } catch (\Exception $exception) {
                $this->assertInstanceOf(\OutOfBoundsException::class, $exception);
            }
        }
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
