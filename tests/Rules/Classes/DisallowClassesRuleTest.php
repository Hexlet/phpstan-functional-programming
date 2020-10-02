<?php

namespace Hexlet\PHPStanFp\Tests\Rules\Classes;

use PHPStan\Testing\RuleTestCase;
use PHPStan\Rules\Rule;
use Hexlet\PHPStanFp\Rules\Classes\DisallowClassesRule;

class DisallowClassesRuleTest extends RuleTestCase
{
    /**
     * @var array<string>
     */
    private $allowedClasses;

    protected function getRule(): Rule
    {
        return new DisallowClassesRule($this->allowedClasses);
    }

    public function testAllDisallowedClasses(): void
    {
        $this->allowedClasses = [];
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use classes',
                3,
            ],
            [
                'Should not use abstract classes',
                8,
            ],
            [
                'Should not use final classes',
                13,
            ],
            [
                'Should not use classes',
                23,
            ],
        ]);
    }

    public function testAllAllowedClasses(): void
    {
        $this->allowedClasses = ['all'];
        $this->analyse([__DIR__ . '/data/classes.php'], []);
    }

    public function testAllowedAbstractClasses(): void
    {
        $this->allowedClasses = ['abstract'];
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use classes',
                3,
            ],
            [
                'Should not use final classes',
                13,
            ],
            [
                'Should not use classes',
                23,
            ],
        ]);
    }

    public function testAllowedFinalClasses(): void
    {
        $this->allowedClasses = ['final'];
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use classes',
                3,
            ],
            [
                'Should not use abstract classes',
                8,
            ],
            [
                'Should not use classes',
                23,
            ],
        ]);
    }

    public function testAllowedClasses(): void
    {
        $this->allowedClasses = ['classes'];
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use abstract classes',
                8,
            ],
            [
                'Should not use final classes',
                13,
            ],
        ]);
    }

    public function testAllowedAbstractFinalClasses(): void
    {
        $this->allowedClasses = ['abstract', 'final'];
        $this->analyse([__DIR__ . '/data/classes.php'], [
            [
                'Should not use classes',
                3,
            ],
            [
                'Should not use classes',
                23,
            ],
        ]);
    }
}
