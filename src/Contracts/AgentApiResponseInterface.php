<?php

namespace Smartsendio\Api\Contracts;

use Smartsendio\Api\Data\Responses\AgentResponse;

interface AgentApiResponseInterface extends ApiResponseInterface
{
    public function getData(): AgentResponse;
}
