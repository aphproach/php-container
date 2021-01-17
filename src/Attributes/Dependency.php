<?php

namespace aphproach\container\Attributes;

#[\Attribute(\Attribute::IS_REPEATABLE|\Attribute::TARGET_METHOD)]
final class Dependency
{
    private string $property;

    private string $object;

    public function __construct(string $property, string $object)
    {
        $this->property = $property;
        $this->object = $object;
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function getObject(): string
    {
        return $this->object;
    }
}