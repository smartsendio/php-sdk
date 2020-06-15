<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\AgentApiResponseInterface;
use Smartsendio\Api\Data\Responses\AgentResponse;

class AgentApiResponse extends AbstractApiResponse implements AgentApiResponseInterface
{
    /** @var AgentResponse */
    protected $data;

    public function getData(): AgentResponse
    {
        if (empty($this->data)) {
            $this->data = new AgentResponse($this->api_response->getDecodedData());
        }

        return $this->data;
    }
}
