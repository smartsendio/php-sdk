<?php

namespace Smartsendio\Api;

use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Smartsendio\Api\Contracts\ApiErrorInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;

abstract class AbstractApiResponse implements ApiResponseInterface
{
    /** @var ApiResponseInterface */
    protected $api_response;

    public function getDecodedData(): array
    {
        return $this->api_response->getDecodedData();
    }

    public function isSuccessful(): bool
    {
        return $this->api_response->isSuccessful();
    }

    public function getResponse(): Psr7ResponseInterface
    {
        return $this->api_response->getResponse();
    }

    public function hasData(): bool
    {
        return $this->api_response->hasData();
    }

    public function getError(): ApiErrorInterface
    {
        return $this->api_response->getError();
    }
}
