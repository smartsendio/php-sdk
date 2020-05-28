<?php

namespace SmartSendIo\Api\Contracts;

interface ApiFactoryInterface extends ApiAuthenticationInterface
{
    public function agents(array $parameters = []): AgentApiInterface;

    public function shipments(array $parameters = []): ShipmentsApiInterface;
}
