<?php

namespace Smartsendio\Api\Contracts;

use Smartsendio\Api\Data\Responses\BookingResponse;

interface BookingApiResponseInterface extends ApiResponseInterface
{
    public function getData(): BookingResponse;
}
