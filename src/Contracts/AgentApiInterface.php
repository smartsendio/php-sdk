<?php

namespace SmartSendIo\Api\Contracts;

interface AgentApiInterface extends ApiAuthenticationInterface, PaginatableInterface
{
    public function carrier(string $carrierCode): self;

    public function country(string $countryCode): self;

    public function postalcode(string $postalcode): self;

    public function street(string $street): self;

    public function lookup(string $agentNo): ApiResponseInterface;

    public function find(string $id): ApiResponseInterface;

    public function get(): ApiResponseInterface;

    public function closest(): ApiResponseInterface;
}
