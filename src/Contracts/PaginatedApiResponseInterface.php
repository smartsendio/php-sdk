<?php

namespace SmartSendIo\Api\Contracts;

interface PaginatedApiResponseInterface extends ApiResponseInterface
{
    public function getCurrentPage(): int;

    public function getLastPage(): int;
}
