<?php

namespace Smartsendio\Api\Data;

use Smartsendio\Api\Contracts\ArrayableInterface;
use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class Parcel implements ArrayableInterface
{
    use ArrayableTrait;
    use ArrayMakableTrait;

    /** @string */
    public $internal_id;

    /** @string */
    public $internal_reference;

    /** @float */
    public $weight;

    /** @float */
    public $height;

    /** @float */
    public $width;

    /** @float */
    public $length;

    /** @string */
    public $freetext;

    /** @float */
    public $total_price_excluding_tax;

    /** @float */
    public $total_price_including_tax;

    /** @float */
    public $total_tax_amount;

    /** @array */
    public $items;

    /**
     * @param  string  $internal_id
     * @return self
     */
    public function setInternalId(string $internal_id)
    {
        $this->internal_id = $internal_id;
        return $this;
    }

    /**
     * @param  string  $internal_reference
     * @return self
     */
    public function setInternalReference(string $internal_reference)
    {
        $this->internal_reference = $internal_reference;
        return $this;
    }

    /**
     * @param  float  $weight
     * @return self
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param  float  $height
     * @return self
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param  float  $width
     * @return self
     */
    public function setWidth(float $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param  float  $length
     * @return self
     */
    public function setLength(float $length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @param  string  $freetext
     * @return self
     */
    public function setFreetext(string $freetext)
    {
        $this->freetext = $freetext;
        return $this;
    }

    /**
     * @param  float  $total_price_excluding_tax
     * @return self
     */
    public function setTotalPriceExcludingTax(float $total_price_excluding_tax)
    {
        $this->total_price_excluding_tax = $total_price_excluding_tax;
        return $this;
    }

    /**
     * @param  float  $total_price_including_tax
     * @return self
     */
    public function setTotalPriceIncludingTax(float $total_price_including_tax)
    {
        $this->total_price_including_tax = $total_price_including_tax;
        return $this;
    }

    /**
     * @param  float  $total_tax_amount
     * @return self
     */
    public function setTotalTaxAmount(float $total_tax_amount)
    {
        $this->total_tax_amount = $total_tax_amount;
        return $this;
    }

    /**
     * @param  array  $items
     * @return self
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param  Item  $item
     * @return self
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
        return $this;
    }
}
