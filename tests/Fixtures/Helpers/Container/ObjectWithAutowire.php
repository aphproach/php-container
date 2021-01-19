<?php

namespace aphproach\container\tests\Fixtures\Helpers\Container;

use aphproach\container\Attributes\AutoWire;

/**
 * Class PlainOldPhpObjectWithArguments
 * @package aphproach\container\tests\Fixtures\Helpers\Container
 */
#[AutoWire(true)] class ObjectWithAutowire
{
    private Dependency $dependency;

    public function getFromDependency(): string
    {
        return $this->dependency->get();
    }
}