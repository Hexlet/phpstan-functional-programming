# DisallowLoopsRule

*Forbid the use of loops*

Loops, such as `for`, `foreach`, `do` or `while` loops, work well when using a procedural paradigm. In functional programming, recursion or implementation agnostic operations like `array_map`, `array_filter` and `array_reduce` are preferred.

### Fail

```php
<?php

$result = [];
$elements = [1, 2, 3];

for ($i = 0; $i < count($elements); $i++) {
    if ($elements[$i] > 2) {
        $result[] = $elements[$i];
    }
}

foreach ($elements as $element) {
    $result[] = $element * 10;
}

$a = 1;
while ($a < 100) {
    $result[] = $a;
    $a *= 2;
}

$b = 1;
do {
    $result[] = $b;
    $b *= 2;
} while ($b < 100);
```

### Pass

```php
<?php

$elements = [1, 2, 3];

$result1 = array_filter($elements, fn($element) => $element > 2);

$result2 = array_map(fn($element) => $element * 10, $elements);

function doubleThemAll(int $n): array
{
	if ($n >= 100) {
		return [];
	}
	
	return [$n, ...doubleThemAll($n * 2)];
}

$result3 = doubleThemAll(1);
```

## Rule configuration

The rule is enabled by default. To turn it off, edit your *phpstan.neon* file.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowLoops: false
```
