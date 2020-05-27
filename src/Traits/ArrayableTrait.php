<?php

namespace SmartSendIo\Api\Traits;

trait ArrayableTrait
{
    public function toArray(): array
    {
        $properties = get_object_vars($this);

        $array = [];
        foreach ($properties as $property) {
            if (is_object($property)) {
                $array[] = $property->toArray();
            } else {
                $array[] = $property;
            }
        }

        return $array;
    }
}
