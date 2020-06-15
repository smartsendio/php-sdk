<?php

namespace Smartsendio\Api\Data\Responses\Booking;

use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class Pdf
{
    use ArrayableTrait;
    use ArrayMakableTrait;

    /** @string */
    public $link;

    /** @string */
    public $base_64_encoded;

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function setBase64Encoded(string $base_64_encoded): void
    {
        $this->base_64_encoded = $base_64_encoded;
    }
}
