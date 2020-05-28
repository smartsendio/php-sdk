<?php

namespace SmartSendIo\Api\Traits;

use SmartSendIo\Api\Contracts\PaginatableInterface;

trait PaginatableTrait
{
    public $page;

    public function page(int $page): PaginatableInterface
    {
        $this->page = $page;
        return $this;
    }
}
