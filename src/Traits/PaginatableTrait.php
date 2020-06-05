<?php

namespace Smartsendio\Api\Traits;

use Smartsendio\Api\Contracts\PaginatableInterface;

trait PaginatableTrait
{
    public $page;

    public function page(int $page): PaginatableInterface
    {
        $this->page = $page;
        return $this;
    }
}
