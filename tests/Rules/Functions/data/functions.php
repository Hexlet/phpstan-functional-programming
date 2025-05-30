<?php

$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);

$last = array_pop($ar2);

array_push($ar2, 6, 7);

$first = array_shift($ar2);

array_splice($ar1, 2);

array_unshift($ar1, -1, 0);

arsort($ar2);

asort($ar2);

krsort($ar2);

ksort($ar2);

natcasesort($ar2);

natsort($ar2);

rsort($ar2);

shuffle($ar2);

sort($ar2);

uasort($ar2, fn($a, $b) => $a <=> $b);

uksort($ar2, fn($a, $b) => $a <=> $b);

usort($ar2, fn($a, $b) => $a <=> $b);

// no error
array_filter($ar1, fn($a) => $a);

// no error
// but maybe should
$fn = 'print_r';
$fn('hello');

// no error but should
$fn2 = 'array_push';
$fn2($ar2, 6);
