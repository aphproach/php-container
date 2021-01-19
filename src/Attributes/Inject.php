<?php

namespace aphproach\container\Attributes;

/**
 * Inject a dependency to a property.
 *
 * @package aphproach\container\Attributes
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
#[\Attribute] class Inject
{
    private string $abstract;

    public function __construct(string $abstract)
    {
        $this->abstract = $abstract;
    }

    public function getAbstract(): string
    {
        return $this->abstract;
    }
}