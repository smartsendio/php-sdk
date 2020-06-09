<?php

namespace Smartsendio\Api\Data\Responses;

use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayConstructableTrait;

class AgentResponse
{
    use ArrayableTrait;
    use ArrayConstructableTrait;

    /**
     * This is the unique id of the agent in the Smart Send system.
     *
     * @string
     */
    public $id;

    /**
     * Smart Send API resouce type - should always be 'agent' for this api.
     *
     * @string
     */
    public $type;

    /**
     * This is the id of agent used by the carrier.
     *
     * @string
     */
    public $agent_no;

    /** @string */
    public $carrier;

    /** @float */
    public $distance;

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
    public $country;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setAgentNo(string $agent_no): void
    {
        $this->agent_no = $agent_no;
    }

    public function setCarrier(string $carrier): void
    {
        $this->carrier = $carrier;
    }

    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public function setNameLine1(string $name_line1): void
    {
        $this->name_line1 = $name_line1;
    }

    public function setNameLine2(string $name_line2): void
    {
        $this->name_line2 = $name_line2;
    }

    public function setAddressLine1(string $address_line1): void
    {
        $this->address_line1 = $address_line1;
    }

    public function setAddressLine2(string $address_line2): void
    {
        $this->address_line2 = $address_line2;
    }

    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}
