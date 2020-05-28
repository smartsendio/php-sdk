<?php

namespace SmartSendIo\Api\Data;

use SmartSendIo\Api\Contracts\ArrayableInterface;
use SmartSendIo\Api\Traits\ArrayableTrait;
use SmartSendIo\Api\Traits\ArrayConstructableTrait;

class Item implements ArrayableInterface
{
    use ArrayableTrait;
    use ArrayConstructableTrait;

    /** @string */
    public $internal_id;

    /** @string */
    public $internal_reference;

    /** @string */
    public $sku;

    /** @string */
    public $name;

    /** @string */
    public $description;

    /** @string */
    public $hs_code;

    /** @string */
    public $country_of_origin;

    /** @string */
    public $image_url;

    /** @string */
    public $unit_weight;

    /** @string */
    public $unit_price_excluding_tax;

    /** @string */
    public $unit_price_including_tax;

    /** @float */
    public $quantity;

    /** @float */
    public $total_price_excluding_tax;

    /** @float */
    public $total_price_including_tax;

    /** @float */
    public $total_tax_amount;

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
     * @param  string  $sku
     * @return self
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param  string  $name
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param  string  $description
     * @return self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param  string  $hs_code
     * @return self
     */
    public function setHsCode(string $hs_code)
    {
        $this->hs_code = $hs_code;
        return $this;
    }

    /**
     * @param  string  $country_of_origin
     * @return self
     */
    public function setCountryOfOrigin(string $country_of_origin)
    {
        $this->country_of_origin = $country_of_origin;
        return $this;
    }

    /**
     * @param  string  $image_url
     * @return self
     */
    public function setImageUrl(string $image_url)
    {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * @param  float  $unit_weight
     * @return self
     */
    public function setUnitWeight(float $unit_weight)
    {
        $this->unit_weight = $unit_weight;
        return $this;
    }

    /**
     * @param  float  $unit_price_excluding_tax
     * @return self
     */
    public function setUnitPriceExcludingTax(float $unit_price_excluding_tax)
    {
        $this->unit_price_excluding_tax = $unit_price_excluding_tax;
        return $this;
    }

    /**
     * @param  float  $unit_price_including_tax
     * @return self
     */
    public function setUnitPriceIncludingTax(float $unit_price_including_tax)
    {
        $this->unit_price_including_tax = $unit_price_including_tax;
        return $this;
    }

    /**
     * @param  float  $quantity
     * @return self
     */
    public function setQuantity(float $quantity)
    {
        $this->quantity = $quantity;
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
}
