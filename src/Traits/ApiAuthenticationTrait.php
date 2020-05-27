<?php

namespace SmartSendIo\Api\Traits;

trait ApiAuthenticationTrait
{
    protected $token;

    protected $website;

    public function token(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function website(string $website): self
    {
        $this->website = $website;
        return $this;
    }
}
