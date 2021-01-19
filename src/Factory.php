<?php

namespace aphproach\container;

use aphproach\container\Blueprint\BlueprintFactory;
use ReflectionClass;
use ReflectionException;

/**
 * Class Factory
 * @package aphproach\container
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
class Factory
{
    private BlueprintFactory $blueprintFactory;

    public function __construct()
    {
        $this->blueprintFactory = new BlueprintFactory();
    }

    /**
     * Make a new instance of given object.
     *
     * @param string $abstract
     *
     * @return object
     */
    public function make(string $abstract): object
    {
        $bluePrint = $this->blueprintFactory->create($abstract);

        if ($bluePrint->isAutoWired()) {

        }

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
    public function makeWithArguments(string $abstract, array $arguments): object
    {
        $reflectionClass = new ReflectionClass($abstract);
        return $reflectionClass->newInstanceArgs($arguments);
    }
}