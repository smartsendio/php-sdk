<?php

namespace Smartsendio\Api;

use Smartsendio\Api\Contracts\ApiErrorInterface;
use Smartsendio\Api\Contracts\ApiErrorLinksInterface;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class ApiError implements ApiErrorInterface
{
    use ArrayMakableTrait;

    /** @ApiErrorLinksInterface */
    public $links;

    /** @string */
    public $id;

    /** @string */
    public $code;

    /** @string */
    public $message;

    /** @array */
    public $errors;

    public function getLinks(): ApiErrorLinksInterface
    {
        return $this->links;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function setLinks(array $links): void
    {
        $this->links = ApiErrorLinks::make($links);
    }

    private function setCode(string $code): void
    {
        $this->code = $code;
    }

    private function setMessage(string $message): void
    {
        $this->message = $message;
    }

    private function setId(string $id): void
    {
        $this->id = $id;
    }

    private function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }
}
