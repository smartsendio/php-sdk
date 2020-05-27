<?php

namespace SmartSendIo\Api;

use SmartSendIo\Api\Contracts\ApiAuthenticationInterface;
use SmartSendIo\Api\Traits\ApiAuthenticationTrait;

abstract class AbstractApi implements ApiAuthenticationInterface
{
    use ApiAuthenticationTrait;

    protected $uri = 'https://app.smartsend.io/api/';

    public $demo = false;

    public function getUri(): string
    {
        return $this->uri;
    }

    abstract public function getVersion(): string;

    public function getBaseUri(string $endpoint = ''): string
    {
        return implode(
            '/',
            array_filter([
                $this->getUri().'v'.$this->getVersion(),
                $this->demo ? 'demo' : null,
                $this->website ? 'website/'.$this->website : null,
                $endpoint,
            ])
        ).'/';
    }

    protected function getPathString(array $pathParameters): string
    {
        $implodes = [];

        foreach ($pathParameters as $key => $value) {
            $implodes[] = $key;
            if (!is_null($value)) {
                $implodes[] = $value;
            }
        }

        return implode('/', $implodes).'/';
    }

    public function demo(bool $demo = true): self
    {
        $this->demo = $demo;
        return $this;
    }
}
