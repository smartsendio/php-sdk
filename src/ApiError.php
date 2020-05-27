<?php

namespace SmartSendIo\Api;

use SmartSendIo\Api\Contracts\ApiErrorLinksInterface;
use SmartSendIo\Api\Traits\ArrayConstructableTrait;

class ApiError implements Contracts\ApiErrorInterface
{
    use ArrayConstructableTrait;

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

    /**
     * @inheritDoc
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    private function setLinks(array $links): void
    {
        $this->links = new ApiErrorLinks($links);
    }

    private function setCode(string $code): void
    {
        $this->code = $code;
    }

    private function setId(string $message): void
    {
        $this->message = $message;
    }

    private function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }
}
