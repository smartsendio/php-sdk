<?php

namespace SmartSendIo\Api\Traits;

trait PaginatableTrait
{
    public $page;

    public function page(int $page): self
    {
        $this->page = $page;
        return $this;
    }
}
