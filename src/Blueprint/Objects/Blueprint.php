<?php

namespace aphproach\container\Blueprint\Objects;

/**
 * Class Blueprint
 * @package aphproach\container\Blueprint
 */
final class Blueprint
{
    public function __construct(
        private string $abstract,
        private array $injections,
        private bool $autoWired = false
    ) {}

    public function getAbstract(): string
    {
        return $this->abstract;
    }

    public function getInjections(): array
    {
        return $this->injections;
    }

    public function isAutoWired(): bool
    {
        return $this->autoWired;
    }
}