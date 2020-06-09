<?php

namespace Smartsendio\Api\Tests\Unit\Data\Responses;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Responses\BookingResponse;

abstract class AbstractBookingResponseTest extends TestCase
{
    /** @var BookingResponse */
    protected $bookingResponse;

    public function setUp(): void
    {
        $this->bookingResponse = new BookingResponse([
            'type' => 'label',
            'shipment_id' => '17765987',
            'shipment_internal_id' => 'S123456',
            'shipment_internal_reference' => 'ORDER123456S',
            'carrier_code' => 'postnord',
            'carrier_name' => 'PostNord',
            'pdf' => [
                'link' => 'https://example.com/labels/DK123456789.pdf',
                'base_64_encoded' => 'b3dlam9pZQ=='
            ],
            'parcels' => [
                [
                    'parcel_id' => '177923',
                    'parcel_internal_id' => 'P123456',
                    'parcel_internal_reference' => 'ORDER123456P',
                    'carrier_code' => 'postnord',
                    'carrier_name' => 'PostNord',
                    'tracking_code' => 'DK123456789',
                    'tracking_link' => 'https://example.com/tracking/DK123456789'
                ],
            ],
        ]);
    }
}
