<?php

namespace Smartsendio\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\ApiError;
use Smartsendio\Api\Contracts\ApiErrorLinksInterface;

class ApiErrorTest extends TestCase
{
    protected $apiError;

    public function setUp(): void
    {
        $this->apiError = ApiError::make([
            'links' => [
                'about' => 'https://smartsend.io/errors/ValidationException',
            ],
            'id' => 'UUID-123456-ABCDE-558ABC',
            'code' => 'ValidationException',
            'message' => 'The given data was invalid.',
            'errors' => [
                'field_name' => [
                    'String describing the error for the given field',
                ],
            ],
        ]);
    }

    public function testGetLinks()
    {
        $this->assertInstanceOf(ApiErrorLinksInterface::class, $this->apiError->getLinks());
        $this->assertEquals(
            'https://smartsend.io/errors/ValidationException',
            $this->apiError->getLinks()->getAbout()
        );
    }

    public function testGetId()
    {
        $this->assertEquals('UUID-123456-ABCDE-558ABC', $this->apiError->getId());
    }

    public function testGetCode()
    {
        $this->assertEquals('ValidationException', $this->apiError->getCode());
    }

    public function testGetMessage()
    {
        $this->assertEquals('The given data was invalid.', $this->apiError->getMessage());
    }

    public function testGetErrors()
    {
        $errors = $this->apiError->getErrors();

        $this->assertIsArray($errors);

        $this->assertCount(1, $errors);

        $this->assertArrayHasKey('field_name', $errors);

        $this->assertIsArray($errors['field_name']);

        $this->assertCount(1, $errors['field_name']);

        $this->assertEquals('String describing the error for the given field', $errors['field_name'][0]);
    }
}
