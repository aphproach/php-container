<?php

namespace aphproach\container\tests\Unit\Application;

use aphproach\container\Application\Application;
use aphproach\container\tests\TestCase;

class ApplicationTest extends TestCase
{

    /** @test */
    public function i_want_to_be_able_to_provide_a_service_configuration(): void
    {
        $serviceYaml = __DIR__ . '/../../Fixtures/Service.yaml';

        $application = new Application();

        $application->register($serviceYaml);
    }

    /** @test */
    public function i_want_to_be_able_to_create_a_instance_of_application(): void
    {
        $application = new Application();

        $this->assertInstanceOf(Application::class, $application);
    }
}