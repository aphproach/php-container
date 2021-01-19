<?php

use aphproach\container\Factory;

if (!function_exists('make')) {
    function make(string $abstract, array|null $arguments = null): object
    {
        // todo: fix efficiency.
        $factory = new Factory();

        if ($arguments) {
            return $factory->makeWithArguments($abstract, $arguments);
        }

        return $factory->make($abstract);
    }
}

