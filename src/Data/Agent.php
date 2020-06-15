<?php

namespace Smartsendio\Api\Data;

use Smartsendio\Api\Contracts\ArrayableInterface;
use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class Agent implements ArrayableInterface
{
    use ArrayableTrait;
    use ArrayMakableTrait;

    /** @string */
    public $internal_id;

    /** @string */
    public $internal_reference;

    /** @string */
    public $agent_no;

    /** @string */
    public $company;

    /** @string */
    public $name_line1;

    /** @string */
    public $name_line2;

    /** @string */
    public $address_line1;

    /** @string */
    public $address_line2;

    /** @string */
    public $postal_code;

    /** @string */
    public $city;

    /** @string */
    public $state;

    /** @string */
    public $country;

    /** @string */
    public $sms;

    /** @string */
    public $email;

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
     * @param  string  $agent_no
     * @return self
     */
    public function setAgentNo(string $agent_no)
    {
        $this->agent_no = $agent_no;
        return $this;
    }

    /**
     * @param  string  $company
     * @return self
     */
    public function setCompany(string $company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @param  string  $name_line1
     * @return self
     */
    public function setNameLine1(string $name_line1)
    {
        $this->name_line1 = $name_line1;
        return $this;
    }

    /**
     * @param  string  $name_line2
     * @return self
     */
    public function setNameLine2(string $name_line2)
    {
        $this->name_line2 = $name_line2;
        return $this;
    }

    /**
     * @param  string  $address_line1
     * @return self
     */
    public function setAddressLine1(string $address_line1)
    {
        $this->address_line1 = $address_line1;
        return $this;
    }

    /**
     * @param  string  $address_line2
     * @return self
     */
    public function setAddressLine2(string $address_line2)
    {
        $this->address_line2 = $address_line2;
        return $this;
    }

    /**
     * @param  string  $postal_code
     * @return self
     */
    public function setPostalCode(string $postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    /**
     * @param  string  $city
     * @return self
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param  string  $state
     * @return self
     */
    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param  string  $country
     * @return self
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param  string  $sms
     * @return self
     */
    public function setSms(string $sms)
    {
        $this->sms = $sms;
        return $this;
    }

    /**
     * @param  string  $email
     * @return self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
}
