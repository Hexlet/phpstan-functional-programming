# DisallowUnusedExpressionRule

*Enforce that an expression gets used*

In functional programming, functions do not mutate any values or cause side-effects, and it is therefore useless to call a function without using its result. The result should be assigned to a variable, passed as a parameter of another function, etc. Unused literals are reported too as they represent dead code.

### Fail

```php
<?php

2 + 5;

foo();

function sum(int $a, int $b)
{
   2 + 5;
}

sum(2, 5);
```

### Pass

```php
<?php

$result1 = 2 + 5;

$result2 = foo();

function sum(int $a, int $b): int
{
   return 2 + 5;
}

$result3 = sum(2, 5);

```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowUnusedExpression: false
```
