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
}
