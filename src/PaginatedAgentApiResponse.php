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
    }

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
                $this->data[] = new AgentResponse($agent);
            }
        }

        return $this->data;
    }
}
