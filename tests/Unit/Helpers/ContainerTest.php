<?php

namespace aphproach\container\tests\Unit\Helpers;

use aphproach\container\tests\Fixtures\Helpers\Container\PlainOldPhpObject;
use aphproach\container\tests\TestCase;

/**
 * Class ContainerTest
 * @package aphproach\container\tests\Unit\Helpers
 */
final class ContainerTest extends TestCase
{
    /** @test */
    public function it_can_create_a_plain_old_php_object(): void
    {
        $result = make(PlainOldPhpObject::class);

        $this->assertInstanceOf(
            PlainOldPhpObject::class,
            $result
        );
    }
}