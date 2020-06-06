<?php

namespace Smartsendio\Api\Contracts;

interface AgentApiInterface extends ApiAuthenticationInterface, PaginatableInterface
{
    public function carrier(string $carrierCode): AgentApiInterface;

    public function country(string $countryCode): AgentApiInterface;

    public function postalcode(string $postalcode): AgentApiInterface;

    public function street(string $street): AgentApiInterface;

    public function lookup(string $agentNo): AgentApiResponseInterface;

    public function find(string $id): AgentApiResponseInterface;

    public function get(): ApiResponseInterface;

    public function closest(): ApiResponseInterface;
}
