<?php

namespace Smartsendio\Api\Contracts;

use Smartsendio\Api\Data\Shipment;

interface BookingApiInterface extends ApiAuthenticationInterface
{
    public function shipment(Shipment $shipment): BookingApiResponseInterface;
}
