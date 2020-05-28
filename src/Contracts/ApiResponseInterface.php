<?php

namespace Smartsendio\Api\Contracts;

use \Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

interface ApiResponseInterface
{
    public function isSuccessful(): bool;

    public function getResponse(): Psr7ResponseInterface;

    public function hasData(): bool;

    public function getError(): ApiErrorInterface;

    public function getData(): array;
}
