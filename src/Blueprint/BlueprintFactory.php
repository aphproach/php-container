<?php

namespace aphproach\container\Blueprint;

use aphproach\container\Attributes\Inject;
use aphproach\container\Blueprint\Objects\Blueprint;
use aphproach\container\Enumerations\AutoWire;
use ReflectionClass;
use ReflectionException;

class BlueprintFactory
{
    /**
     * Create a blueprint of an object.
     *
     * @param string $abstract
     *
     * @return Blueprint
     * @throws ReflectionException
     */
    public function create(string $abstract): Blueprint
    {
        $bluePrintState = [
            'autowire' => AutoWire::DEFAULT_STATE,
            'injections' => []
        ];

        $reflection = new ReflectionClass($abstract);

        $bluePrintState = $this->shouldAbstractAutoWire($reflection, $bluePrintState);
        if (!$bluePrintState['autowire']) {
            $bluePrintState = $this->extractInjectables($reflection, $bluePrintState);
        }

        return new Blueprint($abstract, $bluePrintState['injections'], $bluePrintState['autowire']);
    }

    private function shouldAbstractAutoWire(ReflectionClass $abstract, array $bluePrintState): array
    {
        foreach ($abstract->getAttributes() as $classAttribute) {
            if ($classAttribute->getName() == "aphproach\container\Attributes\AutoWire") {
                $bluePrintState['autowire'] = $classAttribute->newInstance()->shouldAutoWire();
            }
        }
        return $bluePrintState;
    }

    // todo: refactor this code.
    private function extractInjectables(ReflectionClass $abstract, array $bluePrintState)
    {
        foreach ($abstract->getProperties() as $property) {
            foreach ($property->getAttributes() as $attribute) {

                if ($attribute->getName() == "aphproach\container\Attributes\Inject") {
                    /** @var Inject $inject */
                    $inject = $attribute->newInstance();
                    $bluePrintState['injections'][] = [
                        'property' => $property->getName(),
                        'abstract' => $inject->getAbstract()
                    ];
                }
            }
        }

        return $bluePrintState;
    }

}