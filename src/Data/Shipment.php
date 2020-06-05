<?php

namespace Smartsendio\Api\Data;

use Smartsendio\Api\Contracts\ArrayableInterface;
use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayConstructableTrait;

class Shipment implements ArrayableInterface
{
    use ArrayableTrait;
    use ArrayConstructableTrait;

    /** @string */
    public $internal_id;

    /** @string */
    public $internal_reference;

    /** @string */
    public $shipping_carrier;

    /** @string */
    public $shipping_method;

    /** @string */
    public $shipping_date;

    /** @float */
    public $subtotal_price_excluding_tax;

    /** @float */
    public $subtotal_price_including_tax;

    /** @float */
    public $shipping_price_excluding_tax;

    /** @float */
    public $shipping_price_including_tax;

    /** @float */
    public $total_price_excluding_tax;

    /** @float */
    public $total_price_including_tax;

    /** @float */
    public $total_tax_amount;

    /** @string */
    public $currency;

    /** @Receiver */
    public $receiver;

    /** @Sender */
    public $sender;

    /** @Agent */
    public $agent;

    /** @array */
    public $parcels;

    /** @Services */
    public $services;

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
     * @param  string  $shipping_carrier
     * @return self
     */
    public function setShippingCarrier(string $shipping_carrier)
    {
        $this->shipping_carrier = $shipping_carrier;
        return $this;
    }

    /**
     * @param  string  $shipping_method
     * @return self
     */
    public function setShippingMethod(string $shipping_method)
    {
        $this->shipping_method = $shipping_method;
        return $this;
    }

    /**
     * @param  mixed  $shipping_date
     * @return self
     */
    public function setShippingDate(string $shipping_date)
    {
        $this->shipping_date = $shipping_date;
        return $this;
    }

    /**
     * @param  float  $subtotal_price_excluding_tax
     * @return self
     */
    public function setSubtotalPriceExcludingTax(float $subtotal_price_excluding_tax)
    {
        $this->subtotal_price_excluding_tax = $subtotal_price_excluding_tax;
        return $this;
    }

    /**
     * @param  float  $subtotal_price_including_tax
     * @return self
     */
    public function setSubtotalPriceIncludingTax(float $subtotal_price_including_tax)
    {
        $this->subtotal_price_including_tax = $subtotal_price_including_tax;
        return $this;
    }

    /**
     * @param  float  $shipping_price_excluding_tax
     * @return self
     */
    public function setShippingPriceExcludingTax(float $shipping_price_excluding_tax)
    {
        $this->shipping_price_excluding_tax = $shipping_price_excluding_tax;
        return $this;
    }

    /**
     * @param  float  $shipping_price_including_tax
     * @return self
     */
    public function setShippingPriceIncludingTax(float $shipping_price_including_tax)
    {
        $this->shipping_price_including_tax = $shipping_price_including_tax;
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
     * @param  string  $currency
     * @return self
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param  Receiver  $receiver
     * @return self
     */
    public function setReceiver(Receiver $receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @param  Sender  $sender
     * @return self
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @param  mixed  $agent
     * @return self
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * @param  mixed  $parcels
     * @return self
     */
    public function setParcels(array $parcels)
    {
        $this->parcels = $parcels;
        return $this;
    }

    /**
     * @param  Parcel  $parcel
     * @return self
     */
    public function addParcel(Parcel $parcel)
    {
        $this->parcels[] = $parcel;
        return $this;
    }

    /**
     * @param  Services  $services
     * @return self
     */
    public function setServices(Services $services)
    {
        $this->services = $services;
        return $this;
    }
}
