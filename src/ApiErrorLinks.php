<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Traits\ArrayMakableTrait;

class ApiErrorLinks implements Contracts\ApiErrorLinksInterface
{
    use ArrayMakableTrait;

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
