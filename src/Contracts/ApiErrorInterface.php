<?php

namespace Smartsendio\Api\Contracts;

interface ApiErrorInterface
{
    public function getLinks(): ApiErrorLinksInterface;

    /**
     * A unique error code that can be used in support requests.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The error code describing the type of error that occurred.
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * The error description.
     *
     * @return string
     */
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
