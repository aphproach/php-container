<?php

use aphproach\container\Factory;

if (!function_exists('make')) {
    function make(string $abstract)
    {
        return Factory::make($abstract);
    }
}

