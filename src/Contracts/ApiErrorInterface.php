<?php

namespace Smartsendio\Api\Contracts;

interface ApiErrorInterface
{
    public function getLinks(): ApiErrorLinksInterface;

    public function getId(): string;

    public function getCode(): string;

    public function getMessage(): string;

    /**
     * A key-value array of errors.
     *
     * 'some-field' => [
     *  'error1',
     *  'error2',
     *  ...
     * ]
     *
     */
    public function getErrors(): array;
}
