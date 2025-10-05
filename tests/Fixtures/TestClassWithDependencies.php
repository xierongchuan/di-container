<?php

namespace Tests\Fixtures;

class TestClassWithDependencies
{
    public AnotherTestClass $dependency;

    public function __construct(AnotherTestClass $dependency)
    {
        $this->dependency = $dependency;
    }
}
