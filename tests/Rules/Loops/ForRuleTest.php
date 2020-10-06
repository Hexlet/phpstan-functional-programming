<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Loops;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Loops\ForRule;

class ForRuleTest extends RuleTestCase
{
    private bool $disallowLoops;

    protected function getRule(): Rule
    {
        return new ForRule($this->disallowLoops);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowLoops = true;
        $this->analyse([__DIR__ . '/data/loops.php'], [
            [
                'Should not use loop for',
                14,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowLoops = false;
        $this->analyse([__DIR__ . '/data/loops.php'], []);
    }
}
