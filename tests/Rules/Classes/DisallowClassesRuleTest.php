<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Classes;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Classes\DisallowClassesRule;

class DisallowClassesRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new DisallowClassesRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                "Don't use any classes",
                3,
            ],
            [
                "Don't use any classes",
                8,
            ],
            [
                "Don't use any classes",
                13,
            ],
        ]);
    }
}
