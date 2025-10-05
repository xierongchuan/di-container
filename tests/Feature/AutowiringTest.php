<?php

namespace Tests\Feature;

use App\Container;
use Tests\Fixtures\AnotherTestClass;
use Tests\Fixtures\TestClassWithDependencies;
use Tests\TestCase;

class AutowiringTest extends TestCase
{
    public function test_it_autowires_constructor_dependencies(): void
    {
        $container = new Container();
        $resolved = $container->get(TestClassWithDependencies::class);

        $this->assertInstanceOf(TestClassWithDependencies::class, $resolved);
        $this->assertInstanceOf(AnotherTestClass::class, $resolved->dependency);
    }
}
