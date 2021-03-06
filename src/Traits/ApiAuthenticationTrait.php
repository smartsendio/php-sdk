<?php

namespace Smartsendio\Api\Traits;

use Smartsendio\Api\Contracts\ApiAuthenticationInterface;

trait ApiAuthenticationTrait
{
    protected $token;

    protected $website;

    public function token(string $token): ApiAuthenticationInterface
    {
        $this->token = $token;
        return $this;
    }

    public function website(string $website): ApiAuthenticationInterface
    {
        $this->website = $website;
        return $this;
    }
}
