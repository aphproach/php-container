<?php

namespace aphproach\container\tests\Unit\Application;

use aphproach\container\Application\Application;
use aphproach\container\Application\Exceptions\InvalidServiceConfigurationException;
use aphproach\container\tests\TestCase;
use Symfony\Component\Yaml\Exception\ParseException;

class ApplicationRegisterTest extends TestCase
{
    /** @test */
    public function when_the_provided_service_configuration_is_invalid_a_invalid_service_configuration_exception_is_thrown(): void
    {
        $serviceYaml = __DIR__ . '/../../Fixtures/Invalid-service-configuration.yaml';

        $application = new Application();

        $this->expectException(InvalidServiceConfigurationException::class);
        $this->expectExceptionMessage(
            'A service configuration yaml should start with service. File: ' . $serviceYaml
        );

        $application->register($serviceYaml);
    }

    /** @test */
    public function i_want_to_be_able_to_provide_a_service_configuration(): void
    {
        $serviceYaml = __DIR__ . '/../../Fixtures/Service.yaml';

        $application = new Application();

        $this->assertNull(
            $application->register($serviceYaml)
        );
    }

    /** @test */
    public function when_the_provided_service_yaml_path_does_not_exist_throw_a_parse_exception(): void
    {
        $serviceYaml = 'random-path-that-does-not-exist';

        $application = new Application();

        $this->expectException(ParseException::class);
        $this->expectExceptionMessage(
            'File "random-path-that-does-not-exist" does not exist.'
        );

        $this->assertNull(
            $application->register($serviceYaml)
        );
    }
}