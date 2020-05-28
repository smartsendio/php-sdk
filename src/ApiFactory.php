<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\AgentApiInterface;
use Smartsendio\Api\Contracts\ApiFactoryInterface;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Contracts\ShipmentsApiInterface;
use Smartsendio\Api\Traits\ApiAuthenticationTrait;

class ApiFactory implements ApiFactoryInterface
{
    use ApiAuthenticationTrait;

    /** @var ClientInterface */
    protected $client;

    public function __construct(ClientInterface $client, ?string $token = null, ?string $website = null)
    {
        $this->client = $client;
    }

    public function agents(array $parameters = []): AgentApiInterface
    {
        $api = new AgentApi($this->client);

        if ($this->token) {
            $api->token($this->token);
        }

        if ($this->website) {
            $api->website($this->website);
        }

        return $api;
    }

    public function shipments(array $parameters = []): ShipmentsApiInterface
    {
        $api = new ShipmentApi($this->client);

        if ($this->token) {
            $api->token($this->token);
        }

        if ($this->website) {
            $api->website($this->website);
        }

        return $api;
    }
}
