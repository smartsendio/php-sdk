<?php

namespace Smartsendio\Api\Contracts;

interface PaginatedApiResponseInterface extends ApiResponseInterface
{
    /**
     * Get the page count of the current response.
     *
     * @return int
     */
    public function getCurrentPage(): int;

    /**
     * Get the total number of pages.
     *
     * @return int
     */
    public function getLastPage(): int;
}
