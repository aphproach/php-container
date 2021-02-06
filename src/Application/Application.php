<?php

namespace aphproach\container\Application;

use aphproach\container\Application\Exceptions\InvalidServiceConfigurationException;
use Symfony\Component\Yaml\Parser;

class Application
{
    private array $serviceConfiguration = [];

    private Parser $yamlParser;

    public function __construct()
    {
        $this->yamlParser = new Parser();
    }

    public function register(string $serviceConfigurationYamlPath): void
    {
        $serviceConfiguration = $this->yamlParser->parseFile(
            $serviceConfigurationYamlPath
        );

        if (!array_key_exists('Service', $serviceConfiguration)) {
            throw new InvalidServiceConfigurationException(
                'A service configuration yaml should start with service. File: ' . $serviceConfigurationYamlPath
            );
        }

        $serviceConfiguration = $serviceConfiguration['Service'];

        $this->serviceConfiguration[$serviceConfiguration['name']] = $serviceConfiguration;
    }
}