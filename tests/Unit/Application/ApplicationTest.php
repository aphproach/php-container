<?php

namespace aphproach\container\tests\Unit\Application;

use aphproach\container\Application\Application;
use aphproach\container\tests\TestCase;

class ApplicationTest extends TestCase
{
    /** @test */
    public function i_want_to_be_able_to_create_a_instance_of_application(): void
    {
        $application = new Application();

        $this->assertInstanceOf(Application::class, $application);
    }
}