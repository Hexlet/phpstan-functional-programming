<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Variables;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Variables\PostIncRule;

class PostIncRuleTest extends RuleTestCase
{
    private bool $disallowVariablesMutation;

    protected function getRule(): Rule
    {
        return new PostIncRule($this->disallowVariablesMutation);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowVariablesMutation = true;
        $this->analyse([__DIR__ . '/data/incdec.php'], [
            [
                'Forbid the use of mutating operators',
                6,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowVariablesMutation = false;
        $this->analyse([__DIR__ . '/data/incdec.php'], []);
    }
}
