<?php

namespace Tests\Feature;

use App\Container;
use Tests\Fixtures\AnotherTestClass;
use Tests\TestCase;

class LifecycleTest extends TestCase
{
    public function test_it_correctly_manages_singletons(): void
    {
        $container = new Container();
        $container->singleton(AnotherTestClass::class);

        $instance1 = $container->get(AnotherTestClass::class);
        $instance2 = $container->get(AnotherTestClass::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_it_correctly_manages_transient_bindings(): void
    {
        $container = new Container();
        $container->bind(AnotherTestClass::class);

        $instance1 = $container->get(AnotherTestClass::class);
        $instance2 = $container->get(AnotherTestClass::class);

        $this->assertNotSame($instance1, $instance2);
    }
}
