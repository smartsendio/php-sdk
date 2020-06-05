<?php

namespace Smartsendio\Api\Contracts;

interface ApiAuthenticationInterface
{
    public function token(string $token): ApiAuthenticationInterface;

    public function website(string $website): ApiAuthenticationInterface;
}
