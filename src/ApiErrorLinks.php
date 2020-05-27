<?php

namespace SmartSendIo\Api;

use SmartSendIo\Api\Traits\ArrayConstructableTrait;

class ApiErrorLinks implements Contracts\ApiErrorLinksInterface
{
    use ArrayConstructableTrait;

    /** @string */
    public $about;

    public function getAbout(): string
    {
        return $this->about;
    }

    private function setAbout(string $about): void
    {
        $this->about = $about;
    }
}
