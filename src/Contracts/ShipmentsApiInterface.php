<?php

namespace Smartsendio\Api\Contracts;

use Smartsendio\Api\Data\Shipment;

interface ShipmentsApiInterface extends ApiAuthenticationInterface, PaginatableInterface
{
    public function book(Shipment $shipment): ApiResponseInterface; // TODO: Add shipment object
}
