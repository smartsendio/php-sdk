<?php

namespace Smartsendio\Api\Data\Responses\Booking;

use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayConstructableTrait;

class Parcel
{
    use ArrayableTrait;
    use ArrayConstructableTrait;

    /** @string */
    public $parcel_id;

    /** @string */
    public $parcel_internal_id;

    /** @string */
    public $parcel_internal_reference;

    /** @string */
    public $carrier_code;

    /** @string */
    public $carrier_name;

    /** @string */
    public $tracking_code;

    /** @string */
    public $tracking_link;

    public function setParcelId(string $parcel_id): void
    {
        $this->parcel_id = $parcel_id;
    }

    public function setParcelInternalId(string $parcel_internal_id): void
    {
        $this->parcel_internal_id = $parcel_internal_id;
    }

    public function setParcelInternalReference(string $parcel_internal_reference): void
    {
        $this->parcel_internal_reference = $parcel_internal_reference;
    }

    public function setCarrierCode(string $carrier_code): void
    {
        $this->carrier_code = $carrier_code;
    }

    public function setCarrierName(string $carrier_name): void
    {
        $this->carrier_name = $carrier_name;
    }

    public function setTrackingCode(string $tracking_code): void
    {
        $this->tracking_code = $tracking_code;
    }

    public function setTrackingLink(string $tracking_link): void
    {
        $this->tracking_link = $tracking_link;
    }
}
