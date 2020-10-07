<?php

throw new Exception('Exception text');

function example()
{
    // do not cause an error
    $someVar = 'throw';

    $anonymous = new class {};
}

// do not cause an error
function throwName()
{
}
