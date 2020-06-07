<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\ApiResponseInterface;
use Smartsendio\Api\Contracts\PaginatedAgentApiResponseInterface;
use Smartsendio\Api\Data\Responses\AgentResponse;

class PaginatedAgentApiResponse extends AbstractApiResponse implements PaginatedAgentApiResponseInterface
{
    /** @var array|[]AgentResponse */
    protected $data;

    public function __construct(ApiResponseInterface $api_response)
    {
        $this->api_response = $api_response;

        $data = [];
        foreach ($api_response->getDecodedData() as $agent) {
            $data[] = new AgentResponse($agent);
        }
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
