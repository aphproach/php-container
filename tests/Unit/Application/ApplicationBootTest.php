<?php

namespace aphproach\container\tests\Unit\Application;

use aphproach\container\Application\Application;
use aphproach\container\tests\Fixtures\Services\TestService;
use aphproach\container\tests\TestCase;

class ApplicationBootTest extends TestCase
{
    /** @test */
    public function it_can_create_an_instance_of_given_service(): void
    {
        $yamlFile = __DIR__ . '/../../Fixtures/Test-service.yaml';

        $application = new Application();
        $application->register($yamlFile);

        $instance = $application->get(
            'test-service'
        );


        $this->assertInstanceOf(TestService::class, $instance);
    }
}