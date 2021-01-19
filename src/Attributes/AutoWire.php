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
    private bool $autoWire;

    public function __construct(bool $autoWire = false)
    {
        $this->autoWire = $autoWire;
    }

    public function shouldAutoWire(): bool
    {
        return $this->autoWire;
    }
}
