# phpstan-functional-programming

[![github action status](https://github.com/Hexlet/phpstan-functional-programming/workflows/PHP%20CI/badge.svg)](https://github.com/Hexlet/phpstan-functional-programming/actions)

[PHPStan](https://phpstan.org) rules for functional programming

## Install

To use this extension, require it in [Composer](https://getcomposer.org):

```sh
$ composer require --dev hexlet/phpstan-fp
```

## Usage

All of the rules provided (and used) by this library are included in [`extension.neon`](extension.neon).

When you are using [phpstan/extension-installer](https://github.com/phpstan/extension-installer), `extension.neon` will be automatically included.

Otherwise you need to include `extension.neon` in your `phpstan.neon`:

```neon
includes:
  - vendor/hexlet/phpstan-fp/extension.neon
```

## Rules

This package provides the following rules for use with *PHPStan*:

* [`DisallowClassesRule`](docs/rules/DisallowClassesRule.md) - Forbid the use of `class`.
* [`DisallowThrowRule`](docs/rules/DisallowThrowRule.md) - Forbid the use of `throw`.
* [`DisallowUnusedExpressionRule`](docs/rules/DisallowUnusedExpressionRule.md) - Enforce that an expression gets used.
* [`DisallowMutatingFunctionsRule`](docs/rules/DisallowMutatingFunctionsRule.md) - Forbid the use of mutating functions.
* [`DisallowLoopsRule`](docs/rules/DisallowLoopsRule.md) - Forbid the use of loops.
* [`DisallowMutationRule`](docs/rules/DisallowMutationRule.md) - Forbid the use of mutating operators.

## Disabling rules

If you don't want to start using some of the available rules at once, you can.

```neon
parameters:

  phpstanFunctionalProgramming:
    disallowClasses: false
    disallowLoops: false
    disallowThrow: false
    disallowUnusedExpression: false
    disallowVariablesMutation: false
    disallowMutatingFunctions: false
```

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=phpstan-functional-programming)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=phpstan-functional-programming).
