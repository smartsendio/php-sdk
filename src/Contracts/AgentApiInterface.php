<?php

namespace Smartsendio\Api\Contracts;

interface AgentApiInterface extends ApiAuthenticationInterface, PaginatableInterface
{
    public function carrier(string $carrierCode): AgentApiInterface;

    public function country(string $countryCode): AgentApiInterface;

    public function postalcode(string $postalcode): AgentApiInterface;

    public function street(string $street): AgentApiInterface;

    public function lookup(string $agentNo): ApiResponseInterface;

    public function find(string $id): ApiResponseInterface;

    public function get(): ApiResponseInterface;

    public function closest(): ApiResponseInterface;
}
