<?php

class ExampleClass
{

}

abstract class ExampleAbstractClass
{

}

final class ExampleFinalClass
{

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
