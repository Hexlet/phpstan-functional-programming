<?php

class ExampleClass
{
    public function __set($name, $value)
    {
        
    }

    public function doSomething() {
        
    }

    public function __get($name)
    {

    }
}

abstract class ExampleAbstractClass
{

}

final class ExampleFinalClass
{
    public function __set($name, $value)
    {

    }
}

function example()
{
    // do not cause an error
    $someVar = 'class';

    $anonymous = new class {};
}

// do not cause an error
function className()
{
}

function __set()
{
}
