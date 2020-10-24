# DisallowMutatingFunctionsRule

*Forbid the use of mutating functions*

If you want to program as if your variables are immutable, you should not use mutating functions of arrays, such as `array_push`. This rule reports the use of functions with the following names: `array_multisort`, `array_pop`, `array_push`, `array_shift`, `array_splice`, `array_unshift`, `arsort`, `asort`, `krsort`, `ksort`, `natcasesort`, `natsort`, `rsort`, `shuffle`, `sort`, `uasort`, `uksort`, `usort`.

### Fail

```php
<?php

$arr1 = [10, 100, 100, 0];
$arr2 = [1, 3, 2, 4];

array_multisort($arr1, $arr2);
$last = array_pop($arr2);
array_push($arr2, 6, 7);
$first = array_shift($arr2);
array_splice($arr1, 2);
array_unshift($arr1, -1, 0);
arsort($arr2);
asort($arr2);
krsort($arr2);
ksort($arr2);
natcasesort($arr2);
natsort($arr2);
rsort($arr2);
shuffle($arr2);
sort($arr2);
uasort($arr2);
uksort($arr2);
usort($arr2);
```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowMutatingFunctions: false
```
