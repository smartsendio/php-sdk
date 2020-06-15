<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\BookingApiResponseInterface;
use Smartsendio\Api\Data\Responses\BookingResponse;

class BookingApiResponse extends AbstractApiResponse implements BookingApiResponseInterface
{
    /** @var array|[]AgentResponse */
    protected $data;

    public function getData(): BookingResponse
    {
        if (empty($this->data)) {
            $this->data = BookingResponse::make($this->api_response->getDecodedData());
        }

        return $this->data;
    }
}
