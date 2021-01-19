<?php

namespace aphproach\container;

use ReflectionClass;
use ReflectionException;

/**
 * Class Factory
 * @package aphproach\container
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
abstract class Factory
{
    /**
     * Make a new instance of given object.
     *
     * @param string $object
     * @return object
     */
    public static function make(string $abstract): object
    {
        return new $abstract();
    }

    /**
     * Make a new instance of a object with arguments.
     *
     * @param string $abstract
     * @param array $arguments
     *
     * @return object
     * @throws ReflectionException
     */
    public static function makeWithArguments(string $abstract, array $arguments): object
    {
        $reflectionClass = new ReflectionClass($abstract);
        return $reflectionClass->newInstanceArgs($arguments);
    }
}