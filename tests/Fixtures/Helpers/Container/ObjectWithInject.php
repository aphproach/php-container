<?php

namespace aphproach\container\tests\Fixtures\Helpers\Container;

use aphproach\container\Attributes\Inject;

class ObjectWithInject
{
    #[Inject(Dependency::class)]
    private Dependency $dependency;

    public function getFromDependency(): string
    {
        return $this->dependency->get();
    }
}