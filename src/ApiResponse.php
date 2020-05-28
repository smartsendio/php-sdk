<?php

namespace Smartsendio\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use RuntimeException;
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

        return true;
    }

    public function getError(): ApiErrorInterface
    {
        $responseArray = $this->getDecodedResponse();

        return new ApiError($responseArray);
    }

    public function getData(): array
    {
        $responseArray = $this->getDecodedResponse();

        if (! isset($responseArray['data'])) {
            throw new RuntimeException('Unexpected response, missing data');
        }

        return $responseArray['data'];
    }

    protected function getDecodedResponse(): array
    {
        $data = (string) $this->response->getBody(); // Important to cast to string
        return json_decode($data, true);
    }
}
