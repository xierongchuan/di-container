<?php

namespace Tests\Feature;

use App\Container;
use App\Exceptions\ContainerException;
use Tests\Fixtures\TestClassWithUnresolvable;
use Tests\TestCase;

class ExceptionTest extends TestCase
{
    public function test_it_throws_exception_for_unresolvable_dependency(): void
    {
        $this->expectException(ContainerException::class);
        $container = new Container();
        $container->get(TestClassWithUnresolvable::class);
    }

    public function test_it_throws_exception_for_non_existent_class(): void
    {
        $this->expectException(ContainerException::class);
        $container = new Container();
        $container->get('NonExistent\\Class\\Name');
    }
}
