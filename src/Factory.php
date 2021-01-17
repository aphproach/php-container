<?php

namespace aphproach\container;

use aphproach\container\Attributes\Dependency;
use aphproach\container\Attributes\Pure;
use aphproach\container\Reflection\ClassDependencyFetcher;

/**
 * Class Factory
 * @package aphproach\container
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
final class Factory
{
    private ClassDependencyFetcher $dependencyFetcher;

    #[Pure] public function __construct()
    {
        $this->dependencyFetcher = new ClassDependencyFetcher();
    }

    public function make(string $object): object
    {
        /** This part should be cached, so we can faster access dep's */
        $dependencies = array_map(function(Dependency $dependency) {
            return $this->make($dependency->getObject());
        }, $this->dependencyFetcher->fetch($object));

        $object = new $object;

        // Set dependencies on props.


        return $object;
    }

}