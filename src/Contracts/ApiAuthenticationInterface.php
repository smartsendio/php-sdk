<?php

namespace SmartSendIo\Api\Contracts;

interface ApiAuthenticationInterface
{
    public function token(string $token): self;

    public function website(string $website): self;
}
