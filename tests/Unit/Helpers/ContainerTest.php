<?php

namespace aphproach\container\tests\Unit\Helpers;

use aphproach\container\tests\Fixtures\Helpers\Container\ObjectWithAutowire;
use aphproach\container\tests\Fixtures\Helpers\Container\ObjectWithInject;
use aphproach\container\tests\Fixtures\Helpers\Container\PlainOldPhpObject;
use aphproach\container\tests\Fixtures\Helpers\Container\PlainOldPhpObjectWithArguments;
use aphproach\container\tests\TestCase;

/**
 * Class ContainerTest
 * @package aphproach\container\tests\Unit\Helpers
 */
final class ContainerTest extends TestCase
{
    /** @test */
    public function it_can_create_a_class_with_inject(): void
    {
        $result = make(ObjectWithInject::class);

        $this->assertInstanceOf(ObjectWithInject::class, $result);
        $this->assertEquals('Hello, world!', $result->getFromDependency());
    }

    /** @test */
    public function it_can_create_a_class_with_auto_wire(): void
    {
        /** @var ObjectWithAutowire $result */
        $result = make(ObjectWithAutowire::class);

        $this->assertInstanceOf(ObjectWithAutowire::class, $result);
        $this->assertEquals('Hello, world!', $result->getFromDependency());
    }

    /** @test */
    public function it_can_create_a_plain_old_php_object_with_arguments(): void
    {
        $result = make(PlainOldPhpObjectWithArguments::class, [
            'test', ['test'], 1
        ]);

        $this->assertInstanceOf(PlainOldPhpObjectWithArguments::class, $result);
    }

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