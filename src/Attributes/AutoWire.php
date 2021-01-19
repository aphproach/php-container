<?php

declare(strict_types=1);

namespace aphproach\container\Attributes;

/**
 * With auto wiring dependencies are automatically resolved and injected.
 *
 * @package aphproach\container\Attributes
 * @author Romano Schoonheim <romano@romanoschoonheim.nl>
 */
final class AutoWire
{
    private array $properties;

    /**
     * AutoWire constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }
}
