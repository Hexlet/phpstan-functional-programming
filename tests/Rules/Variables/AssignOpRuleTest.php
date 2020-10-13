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
                'Should not use of mutating operators',
                12,
            ],
            [
                'Should not use of mutating operators',
                14,
            ],
            [
                'Should not use of mutating operators',
                16,
            ],
            [
                'Should not use of mutating operators',
                18,
            ],
            [
                'Should not use of mutating operators',
                20,
            ],
            [
                'Should not use of mutating operators',
                22,
            ],
            [
                'Should not use of mutating operators',
                24,
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
                30,
            ],
            [
                'Should not use of mutating operators',
                32,
            ],
            [
                'Should not use of mutating operators',
                37,
            ],
            [
                'Should not use of mutating operators',
                42,
            ],
            [
                'Should not use of mutating operators',
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
