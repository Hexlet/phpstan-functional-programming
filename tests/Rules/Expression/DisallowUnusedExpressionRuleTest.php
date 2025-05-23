<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Expression;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Expression\DisallowUnusedExpressionRule;

class DisallowUnusedExpressionRuleTest extends RuleTestCase
{
    private bool $disallowUnusedExpression;

    protected function getRule(): Rule
    {
        return new DisallowUnusedExpressionRule($this->disallowUnusedExpression);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowUnusedExpression = true;
        $this->analyse([__DIR__ . '/data/expressions.php'], [
            [
                'Enforce that an expression gets used',
                8,
            ],
            [
                'Enforce that an expression gets used',
                10,
            ],
            [
                'Enforce that an expression gets used',
                12,
            ],
            [
                'Enforce that an expression gets used',
                22,
            ],
            [
                'Enforce that an expression gets used',
                24,
            ],
            [
                'Enforce that an expression gets used',
                28,
            ],
            [
                'Enforce that an expression gets used',
                31,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowUnusedExpression = false;
        $this->analyse([__DIR__ . '/data/expressions.php'], []);
    }
}
