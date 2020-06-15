<?php

namespace Smartsendio\Api\Data;

use Smartsendio\Api\Contracts\ArrayableInterface;
use Smartsendio\Api\Traits\ArrayableTrait;
use Smartsendio\Api\Traits\ArrayMakableTrait;

class Services implements ArrayableInterface
{
    use ArrayableTrait;
    use ArrayMakableTrait;

    /**
     * Email address used for carrier email notification.
     *
     * @string
     */
    public $email_notification;

    /**
     * SMS number used for carrier email notification.
     *
     * @string
     */
    public $sms_notification;

    /**
     * Carrier delivery instruction for flexible delivery option.
     *
     * @string
     */
    public $flex_delivery;

    /**
     * @param  string  $email_notification
     * @return self
     */
    public function setEmailNotification(string $email_notification)
    {
        $this->email_notification = $email_notification;
        return $this;
    }

    /**
     * @param  string  $sms_notification
     * @return self
     */
    public function setSmsNotification(string $sms_notification)
    {
        $this->sms_notification = $sms_notification;
        return $this;
    }

    /**
     * @param  string  $flex_delivery
     * @return self
     */
    public function setFlexDelivery(string $flex_delivery)
    {
        $this->flex_delivery = $flex_delivery;
        return $this;
    }
}
