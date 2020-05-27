<?php

namespace SmartSendIo\Api\Contracts;

use SmartSendIo\Api\Data\Shipment;

interface ShipmentsApiInterface extends ApiAuthenticationInterface
{
    public function book(Shipment $shipment): ApiResponseInterface; // TODO: Add shipment object
}
