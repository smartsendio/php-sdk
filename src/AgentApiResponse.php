<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\AgentApiResponseInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;
use Smartsendio\Api\Data\Responses\AgentResponse;

class AgentApiResponse extends AbstractApiResponse implements AgentApiResponseInterface
{
    /** @var AgentResponse */
    protected $data;

    public function __construct(ApiResponseInterface $api_response)
    {
        $this->api_response = $api_response;
        $this->data = new AgentResponse($api_response->getDecodedData());
    }

    public function getData(): AgentResponse
    {
        return $this->data;
    }
}
