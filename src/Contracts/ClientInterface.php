<?php

namespace Smartsendio\Api\Contracts;

interface ClientInterface
{
    public function get(string $uri, array $query = []): ApiResponseInterface;

    public function post(string $uri, array $query = [], array $body = []): ApiResponseInterface;

    public function put(string $uri, array $query = [], array $body = []): ApiResponseInterface;

    public function patch(string $uri, array $query = [], array $body = []): ApiResponseInterface;

    public function delete(string $uri, array $query = [], array $body = []): ApiResponseInterface;
}
