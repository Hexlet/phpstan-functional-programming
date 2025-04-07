<?php

// do not cause an error
$a = 6;

// do not cause an error
$b = 21;

// do not cause an error
$link_a =& $a;

$link_a = 18;

$a = 15;

function ds($arg1, &$arg2)
{
    $arg1 = 2;
    $arg2 = 'text';

    // do not cause an error
    $some = $arg1;
}

ds($a, $b);

$a = null;

$a = 78;

$fn1 = function () use ($a) {
    $a = 5;
};

$fn1 = function () use (&$a) {
    $a = 26;
};

// do not cause an error
$arr = [1, 2, 3];

$arr[1] = 5;

$arr[] = 125;

$arr = [5, 6, 7];

// do not cause an error
[$first, $second] = $arr;

[$a] = $arr;

[$newVar, $a] = [5, 6, 7];
