<?php

namespace SmartSendIo\Api\Contracts;

interface PaginatableInterface
{
    public function page(int $page): self;
}
