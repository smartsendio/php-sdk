<?php

namespace Smartsendio\Api;

use OutOfBoundsException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Smartsendio\Api\Contracts\ApiErrorInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;

class ApiResponse implements ApiResponseInterface
{
    /** @var Psr7ResponseInterface */
    protected $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function isSuccessful(): bool
    {
        return $this->response->getStatusCode() >= 200
            && $this->response->getStatusCode() < 300;
    }

    public function getResponse(): Psr7ResponseInterface
    {
        return $this->response;
    }

    public function hasData(): bool
    {
        $responseArray = $this->getDecodedResponse();

        if (!isset($responseArray['data'])) {
            return false;
        }

        if (empty($responseArray['data'])) {
            return false;
        }

        return true;
    }

    public function hasLinks(): bool
    {
        $responseArray = $this->getDecodedResponse();

        if (!isset($responseArray['links'])) {
            return false;
        }

        if (empty($responseArray['links'])) {
            return false;
        }

        return true;
    }

    public function getLinks(): array
    {
        $responseArray = $this->getDecodedResponse();

        if (! isset($responseArray['links'])) {
            throw new OutOfBoundsException('Unexpected response, missing links');
        }

        if (empty($responseArray['links'])) {
            throw new OutOfBoundsException('Unexpected response, no links');
        }

        return $responseArray['links'];
    }

    public function hasMeta(): bool
    {
        $responseArray = $this->getDecodedResponse();

        if (!isset($responseArray['meta'])) {
            return false;
        }

        if (empty($responseArray['meta'])) {
            return false;
        }

        return true;
    }

    public function getMeta(): array
    {
        $responseArray = $this->getDecodedResponse();

        if (! isset($responseArray['meta'])) {
            throw new OutOfBoundsException('Unexpected response, missing meta');
        }

        if (empty($responseArray['meta'])) {
            throw new OutOfBoundsException('Unexpected response, no meta');
        }

        return $responseArray['meta'];
    }

    public function getError(): ApiErrorInterface
    {
        $responseArray = $this->getDecodedResponse();

        return new ApiError($responseArray);
    }

    public function getDecodedData(): array
    {
        $responseArray = $this->getDecodedResponse();

        if (! isset($responseArray['data'])) {
            throw new OutOfBoundsException('Unexpected response, missing data');
        }

        return $responseArray['data'];
    }

    protected function getDecodedResponse(): array
    {
        $data = (string) $this->response->getBody(); // Important to cast to string
        return json_decode($data, true);
    }
}
