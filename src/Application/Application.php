<?php

namespace aphproach\container\Application;

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
        )['Service'];

        $this->serviceConfiguration[$serviceConfiguration['name']] = $serviceConfiguration;
    }
}