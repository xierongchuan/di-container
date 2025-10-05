<?php

namespace Tests\Feature;

use App\Container;
use Tests\Fixtures\AnotherTestClass;
use Tests\Fixtures\TestClassWithoutConstructor;
use Tests\Fixtures\TestInterface;
use Tests\Fixtures\TestClassWithInterface;
use Tests\TestCase;

class BindingTest extends TestCase
{
    public function test_it_can_bind_and_resolve_a_concrete_class(): void
    {
        $container = new Container();
        $container->bind(AnotherTestClass::class);
        $resolved = $container->get(AnotherTestClass::class);

        $this->assertInstanceOf(AnotherTestClass::class, $resolved);
    }

    public function test_it_resolves_dependencies_via_interface(): void
    {
        $container = new Container();
        $container->bind(TestInterface::class, TestClassWithInterface::class);
        $resolved = $container->get(TestInterface::class);

        $this->assertInstanceOf(TestClassWithInterface::class, $resolved);
    }

    public function test_it_can_resolve_class_without_constructor(): void
    {
        $container = new Container();
        $resolved = $container->get(TestClassWithoutConstructor::class);

        $this->assertInstanceOf(TestClassWithoutConstructor::class, $resolved);
    }
}
