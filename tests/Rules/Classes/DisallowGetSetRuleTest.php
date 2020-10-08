<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Classes;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Classes\DisallowGetSetRule;

class DisallowGetSetRuleTest extends RuleTestCase
{
    private bool $disallowGetSet;

    protected function getRule(): Rule
    {
        return new DisallowGetSetRule($this->disallowGetSet);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowGetSet = true;
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use magic method __set',
                5,
            ],
            [
                'Should not use magic method __get',
                14,
            ],
            [
                'Should not use magic method __set',
                27,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowGetSet = false;
        $this->analyse([__DIR__ . '/data/classes.php'], []);
    }
}
