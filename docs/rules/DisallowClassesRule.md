# DisallowClassesRule

*Forbid the use of `class`*

Classes are nice tools to use when programming with the object-oriented paradigm, as they hold internal state and give access to methods on the instances. In functional programming, having stateful objects is more harmful than helpful, and should be replaced by the use of pure functions.

### Fail

```php
<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}
```

### Pass

```php
<?php

function point(int $x, int $y): array
{
    return [
        'x' => $x,
        'y' => $y,
    ];
}
```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowClasses: false
```
