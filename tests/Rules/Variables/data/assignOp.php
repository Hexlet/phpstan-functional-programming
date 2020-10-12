<?php

// do not cause an error
$a = 6;

// do not cause an error
$b = 21;

// do not cause an error
$link_a =& $a;

$a += 1;

$a -= 1;

$a *= 1;

$a /= 1;

$a %= 1;

$a **= 1;

$a &= 1;

$a |= 1;

$a ^= 1;

$a <<= 1;

$a >>= 1;

// do not cause an error
$c ??= 5;

$c ??= 7;

// do not cause an error
$text = 'hello';

$text .= ' world';

$link_a += 1;
