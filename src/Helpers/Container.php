<?php

use aphproach\container\Factory;

if (!function_exists('make')) {
    function make(string $abstract, array|null $arguments = null): object
    {
        if ($arguments) {
            return Factory::makeWithArguments($abstract, $arguments);
        }

        return Factory::make($abstract);
    }
}

