<?php

namespace Smartsendio\Api\Contracts;

interface BookingApiResponseInterface extends ApiResponseInterface
{
    public function getData(): AgentResponse;
}
