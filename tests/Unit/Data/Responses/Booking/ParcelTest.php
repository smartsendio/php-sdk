<?php

namespace Smartsendio\Api\Tests\Unit\Data\Responses\Booking;

use Smartsendio\Api\Tests\Unit\Data\Responses\AbstractBookingResponseTest;

class ParcelTest extends AbstractBookingResponseTest
{
    public function testParcelId()
    {
        $this->assertEquals('177923', $this->bookingResponse->parcels[0]->parcel_id);
    }

    public function testParcelInternalId()
    {
        $this->assertEquals('P123456', $this->bookingResponse->parcels[0]->parcel_internal_id);
    }

    public function testParcelInternalReference()
    {
        $this->assertEquals('ORDER123456P', $this->bookingResponse->parcels[0]->parcel_internal_reference);
    }

    public function testCarrierCode()
    {
        $this->assertEquals('postnord', $this->bookingResponse->parcels[0]->carrier_code);
    }

    public function testCarrierName()
    {
        $this->assertEquals('PostNord', $this->bookingResponse->parcels[0]->carrier_name);
    }

    public function testTrackingCode()
    {
        $this->assertEquals('DK123456789', $this->bookingResponse->parcels[0]->tracking_code);
    }

    public function testTrackingLink()
    {
        $this->assertEquals('https://example.com/tracking/DK123456789', $this->bookingResponse->parcels[0]->tracking_link);
    }
}
