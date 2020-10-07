<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Exceptions;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Exceptions\DisallowThrowRule;

class DisallowThrowRuleTest extends RuleTestCase
{
    private bool $disallowThrow;

    protected function getRule(): Rule
    {
        return new DisallowThrowRule($this->disallowThrow);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowThrow = true;
        $this->analyse([__DIR__ . '/data/exceptions.php'], [
            [
                'Should not use throw',
                3,
            ]
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowThrow = false;
        $this->analyse([__DIR__ . '/data/exceptions.php'], []);
    }
}
