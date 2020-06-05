<?php

namespace Smartsendio\Api\Contracts;

interface PaginatableInterface
{
    public function page(int $page): PaginatableInterface;
}
