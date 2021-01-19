<?php

namespace aphproach\container\tests\Fixtures\Helpers\Container;

class Dependency
{
    public function get(): string
    {
        return 'Hello, world!';
    }
}