<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Variables;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Variables\AssignRule;

class AssignRuleTest extends RuleTestCase
{
    private bool $disallowVariablesMutation;

    protected function getRule(): Rule
    {
        return new AssignRule($this->disallowVariablesMutation);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowVariablesMutation = true;
        $this->analyse([__DIR__ . '/data/assign.php'], [
            [
                'Should not use of mutating operators',
                12,
            ],
            [
                'Should not use of mutating operators',
                14,
            ],
            [
                'Should not use of mutating operators',
                17,
            ],
            [
                'Should not use of mutating operators',
                18,
            ],
            [
                'Should not use of mutating operators',
                26,
            ],
            [
                'Should not use of mutating operators',
                28,
            ],
            [
                'Should not use of mutating operators',
                31,
            ],
            [
                'Should not use of mutating operators',
                34,
            ],
            [
                'Should not use of mutating operators',
                35,
            ],
            [
                'Should not use of mutating operators',
                41,
            ],
            [
                'Should not use of mutating operators',
                43,
            ],
            [
                'Should not use of mutating operators',
                45,
            ],
            [
                'Should not use of mutating operators',
                50,
            ],
            [
                'Should not use of mutating operators',
                52,
            ],
            [
                'Should not use of mutating operators',
                54,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowVariablesMutation = false;
        $this->analyse([__DIR__ . '/data/assign.php'], []);
    }
}
