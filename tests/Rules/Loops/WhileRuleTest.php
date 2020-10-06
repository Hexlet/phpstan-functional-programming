<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Loops;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Loops\WhileRule;

class WhileRuleTest extends RuleTestCase
{
    private bool $disallowLoops;

    protected function getRule(): Rule
    {
        return new WhileRule($this->disallowLoops);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowLoops = true;
        $this->analyse([__DIR__ . '/data/loops.php'], [
            [
                'Should not use loop while',
                4,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowLoops = false;
        $this->analyse([__DIR__ . '/data/loops.php'], []);
    }
}
