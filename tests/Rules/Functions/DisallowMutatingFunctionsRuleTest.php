<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Functions;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Functions\DisallowMutatingFunctionsRule;

class DisallowMutatingFunctionsRuleTest extends RuleTestCase
{
    private bool $disallowMutatingFunctions;

    protected function getRule(): Rule
    {
        return new DisallowMutatingFunctionsRule($this->disallowMutatingFunctions);
    }

    public function testWithEnabledRule(): void
    {
        $this->disallowMutatingFunctions = true;
        $this->analyse([__DIR__ . '/data/functions.php'], [
            [
                'The use of function \'array_multisort\' is not allowed as it might be a mutating function',
                5,
            ],
            [
                'The use of function \'array_pop\' is not allowed as it might be a mutating function',
                7,
            ],
            [
                'The use of function \'array_push\' is not allowed as it might be a mutating function',
                9,
            ],
            [
                'The use of function \'array_shift\' is not allowed as it might be a mutating function',
                11,
            ],
            [
                'The use of function \'array_splice\' is not allowed as it might be a mutating function',
                13,
            ],
            [
                'The use of function \'array_unshift\' is not allowed as it might be a mutating function',
                15,
            ],
            [
                'The use of function \'arsort\' is not allowed as it might be a mutating function',
                17,
            ],
            [
                'The use of function \'asort\' is not allowed as it might be a mutating function',
                19,
            ],
            [
                'The use of function \'krsort\' is not allowed as it might be a mutating function',
                21,
            ],
            [
                'The use of function \'ksort\' is not allowed as it might be a mutating function',
                23,
            ],
            [
                'The use of function \'natcasesort\' is not allowed as it might be a mutating function',
                25,
            ],
            [
                'The use of function \'natsort\' is not allowed as it might be a mutating function',
                27,
            ],
            [
                'The use of function \'rsort\' is not allowed as it might be a mutating function',
                29,
            ],
            [
                'The use of function \'shuffle\' is not allowed as it might be a mutating function',
                31,
            ],
            [
                'The use of function \'sort\' is not allowed as it might be a mutating function',
                33,
            ],
            [
                'The use of function \'uasort\' is not allowed as it might be a mutating function',
                35,
            ],
            [
                'The use of function \'uksort\' is not allowed as it might be a mutating function',
                37,
            ],
            [
                'The use of function \'usort\' is not allowed as it might be a mutating function',
                39,
            ],
        ]);
    }

    public function testWithDisabledRule(): void
    {
        $this->disallowMutatingFunctions = false;
        $this->analyse([__DIR__ . '/data/functions.php'], []);
    }
}
