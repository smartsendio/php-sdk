<?php

namespace Smartsendio\Api\Tests\Unit\Data\Responses;

use Smartsendio\Api\Data\Responses\Booking\Parcel;
use Smartsendio\Api\Data\Responses\Booking\Pdf;

class BookingResponseTest extends AbstractBookingResponseTest
{
    public function testType()
    {
        $this->assertEquals('label', $this->bookingResponse->type);
    }

    public function testShipmentId()
    {
        $this->assertEquals('17765987', $this->bookingResponse->shipment_id);
    }

    public function testShipmentInternalId()
    {
        $this->assertEquals('S123456', $this->bookingResponse->shipment_internal_id);
    }

    public function testShipmentInternalReference()
    {
        $this->assertEquals('ORDER123456S', $this->bookingResponse->shipment_internal_reference);
    }

    public function testCarrierCode()
    {
        $this->assertEquals('postnord', $this->bookingResponse->carrier_code);
    }

    public function testCarrierName()
    {
        $this->assertEquals('PostNord', $this->bookingResponse->carrier_name);
    }

    public function testPdf()
    {
        $this->assertInstanceOf(Pdf::class, $this->bookingResponse->pdf);
    }

    public function testParcels()
    {
        $this->assertIsArray($this->bookingResponse->parcels);
        $this->assertCount(1, $this->bookingResponse->parcels);
        $this->assertContainsOnlyInstancesOf(Parcel::class, $this->bookingResponse->parcels);
    }
}
