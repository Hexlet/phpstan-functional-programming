# DisallowThrowRule

*Forbid the use of `throw`*

When you throw an exception in PHP, you effectively perform a `GOTO`: your position in the program's execution jumps to the appropriate exception handler, and execution continues. This is fine, but it obviously means that your original function has a side-effect: calling it will fundamentally alter the program flow.

### Fail

```php
<?php

function throwAnError(): void
{
    throw new Exception('some error message');
}
```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowThrow: false
```