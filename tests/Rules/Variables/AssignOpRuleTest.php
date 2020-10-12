<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Variables;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Variables\AssignOpRule;

class AssignOpRuleTest extends RuleTestCase
{
    private bool $disallowVariablesMutation;

    protected function getRule(): Rule
    {
        return new AssignOpRule($this->disallowVariablesMutation);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowVariablesMutation = true;
        $this->analyse([__DIR__ . '/data/assignOp.php'], [
            [
                'Forbid the use of mutating operators',
                12,
            ],
            [
                'Forbid the use of mutating operators',
                14,
            ],
            [
                'Forbid the use of mutating operators',
                16,
            ],
            [
                'Forbid the use of mutating operators',
                18,
            ],
            [
                'Forbid the use of mutating operators',
                20,
            ],
            [
                'Forbid the use of mutating operators',
                22,
            ],
            [
                'Forbid the use of mutating operators',
                24,
            ],
            [
                'Forbid the use of mutating operators',
                26,
            ],
            [
                'Forbid the use of mutating operators',
                28,
            ],
            [
                'Forbid the use of mutating operators',
                30,
            ],
            [
                'Forbid the use of mutating operators',
                32,
            ],
            [
                'Forbid the use of mutating operators',
                37,
            ],
            [
                'Forbid the use of mutating operators',
                42,
            ],
            [
                'Forbid the use of mutating operators',
                44,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowVariablesMutation = false;
        $this->analyse([__DIR__ . '/data/assignOp.php'], []);
    }
}
