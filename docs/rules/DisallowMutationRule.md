# DisallowMutationRule

*Forbid the use of mutating operators*

If you want to program as if your variables are immutable, part of the answer is to not mutation by re-assigning to a variable, and not use update operators like `++`, `+=` or `--` and others.

### Fail

```php
<?php

$a = 6;
$b =& $a;
$text = 'hello';
$arr = [1, 2, 3];

$b = 18;
$a = 15;

$a += 1;
$a -= 1;
$a *= 1;
$a /= 1;
$a %= 1;
$a ??= 7;
$text .= ' world';
...

$a++;
$a--;
++$a;
--$a;

function (int $num1, &$num2)
{
    $num1 = 2;
    $num2 = 5;
}

$fn = function () use ($a, &$b) {
    $a = 5;
    $b = 10;
};

$arr[1] = 5;
$arr[] = 125;
$arr = [5, 6, 7];
[$a, $b] = $arr;
```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowVariablesMutation: false
```
