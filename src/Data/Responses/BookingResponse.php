<?php

namespace Smartsendio\Api\Data\Responses;

use Smartsendio\Api\Data\Responses\Booking\Parcel;
use Smartsendio\Api\Data\Responses\Booking\Pdf;
use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class BookingResponse
{
    use ArrayableTrait;
    use ArrayMakableTrait;

    /**
     * Smart Send API resource type - should always be 'label' for this api.
     *
     * @string
     */
    public $type;

    /** @string */
    public $shipment_id;

    /** @string */
    public $shipment_internal_id;

    /** @string */
    public $shipment_internal_reference;

    /** @string */
    public $carrier_code;

    /** @string */
    public $carrier_name;

    /** @var Pdf */
    public $pdf;

    /** @var array[[]Parcel */
    public $parcels;

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setShipmentId(string $shipment_id): void
    {
        $this->shipment_id = $shipment_id;
    }

    public function setShipmentInternalId(string $shipment_internal_id): void
    {
        $this->shipment_internal_id = $shipment_internal_id;
    }

    public function setShipmentInternalReference(string $shipment_internal_reference): void
    {
        $this->shipment_internal_reference = $shipment_internal_reference;
    }

    public function setCarrierCode(string $carrier_code): void
    {
        $this->carrier_code = $carrier_code;
    }

    public function setCarrierName(string $carrier_name): void
    {
        $this->carrier_name = $carrier_name;
    }

    public function setPdf(array $pdf): void
    {
        $this->pdf = Pdf::make($pdf);
    }

    public function setParcels(array $parcels): void
    {
        $this->parcels = [];

        foreach ($parcels as $parcel) {
            $this->parcels[] = Parcel::make($parcel);
        }
    }
}
