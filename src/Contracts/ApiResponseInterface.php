<?php

namespace Smartsendio\Api\Contracts;

use \Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

interface ApiResponseInterface
{
    public function isSuccessful(): bool;

    public function getResponse(): Psr7ResponseInterface;

    public function hasData(): bool;

    public function hasLinks(): bool;

    public function getLinks(): array;

    public function hasMeta(): bool;

    public function getMeta(): array;

    public function getError(): ApiErrorInterface;

    public function getDecodedData(): array;
}
