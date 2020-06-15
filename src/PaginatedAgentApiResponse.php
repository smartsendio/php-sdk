<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\ApiResponseInterface;
use Smartsendio\Api\Contracts\PaginatedAgentApiResponseInterface;
use Smartsendio\Api\Data\Responses\AgentResponse;

class PaginatedAgentApiResponse extends AbstractApiResponse implements PaginatedAgentApiResponseInterface
{
    /** @var array|[]AgentResponse */
    protected $data;

    /**
     * Get all the agents that was returned in the response.
     *
     * @return array|[]AgentResponse
     */
    public function getData(): array
    {
        if (empty($this->data)) {
            $this->data = [];
            foreach ($this->api_response->getDecodedData() as $agent) {
                $this->data[] = AgentResponse::make($agent);
            }
        }

        return $this->data;
    }
}
