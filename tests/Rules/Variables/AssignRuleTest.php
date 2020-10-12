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
                'Forbid the use of mutating operators',
                12,
            ],
            [
                'Forbid the use of mutating operators',
                14,
            ],
            [
                'Forbid the use of mutating operators',
                17,
            ],
            [
                'Forbid the use of mutating operators',
                18,
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
                31,
            ],
            [
                'Forbid the use of mutating operators',
                34,
            ],
            [
                'Forbid the use of mutating operators',
                35,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowVariablesMutation = false;
        $this->analyse([__DIR__ . '/data/assign.php'], []);
    }
}
