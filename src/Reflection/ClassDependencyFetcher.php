<?php

namespace aphproach\container\Reflection;

use aphproach\container\Attributes\Dependency;
use ReflectionAttribute;
use ReflectionClass;

/**
 * Class ClassDependencyFetcher
 * @package aphproach\container\Reflection
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
final class ClassDependencyFetcher
{
    public function fetch(string $class): array
    {
        $reflectionClass = new ReflectionClass($class);
        $constructorAttributes = $reflectionClass->getConstructor()?->getAttributes();

        if (!$constructorAttributes) {
            $constructorAttributes = [];
        }

        return array_filter($constructorAttributes, function(ReflectionAttribute $reflectionAttribute) {
            return (bool) ($reflectionAttribute->getName() === 'Dependency');
        });
    }
}