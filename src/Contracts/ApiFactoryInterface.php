<?php

namespace Smartsendio\Api\Contracts;

interface ApiFactoryInterface extends ApiAuthenticationInterface
{
    public function agents(array $parameters = []): AgentApiInterface;

    public function bookings(array $parameters = []): BookingApiInterface;
}
