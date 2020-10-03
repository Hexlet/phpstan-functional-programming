<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Classes;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Classes\DisallowClassesRule;

class DisallowClassesRuleTest extends RuleTestCase
{
    private bool $disallowClasses;

    protected function getRule(): Rule
    {
        return new DisallowClassesRule($this->disallowClasses);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowClasses = true;
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use classes',
                3,
            ],
            [
                'Should not use classes',
                8,
            ],
            [
                'Should not use classes',
                13,
            ],
            [
                'Should not use classes',
                23,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowClasses = false;
        $this->analyse([__DIR__ . '/data/classes.php'], []);
    }
}
