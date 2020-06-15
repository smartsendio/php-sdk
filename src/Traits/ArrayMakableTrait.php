<?php

namespace Smartsendio\Api\Traits;

trait ArrayMakableTrait
{
    public static function make(array $parameters = [])
    {
        $instance = new static();

        foreach ($parameters as $key => $value) {
            if (is_null($value)) {
                // We are not setting any null values.
                // This will be changed when implementing 'nullable type declarations' which require PHP 7.1
                continue;
            }

            $method = 'set'.str_replace('_', '', ucwords($key, '_')); // 'about' => 'setAbout'
            if (method_exists($instance, $method)) {
                $instance->{$method}($value);
            }
        }

        return $instance;
    }
}
