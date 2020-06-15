<?php

namespace Smartsendio\Api\Tests\Unit\Data\Responses\Booking;

use Smartsendio\Api\Tests\Unit\Data\Responses\AbstractBookingResponseTest;

class PdfTest extends AbstractBookingResponseTest
{
    public function testLink()
    {
        $this->assertEquals('https://example.com/labels/DK123456789.pdf', $this->bookingResponse->pdf->link);
    }

    public function testBase64Encoded()
    {
        $this->assertEquals('b3dlam9pZQ==', $this->bookingResponse->pdf->base_64_encoded);
    }
}
