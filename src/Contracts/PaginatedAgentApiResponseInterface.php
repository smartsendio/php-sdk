<?php

namespace Smartsendio\Api\Contracts;

interface PaginatedAgentApiResponseInterface extends PaginatedApiResponseInterface
{
    /**
     * @return array|[]AgentResponse
     */
    public function getData(): array;
}
