<?php

namespace aphproach\container;

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
    public static function make(string $object): object
    {
        return new $object();
    }
}