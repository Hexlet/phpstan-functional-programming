<?php

namespace Hexlet\PHPStanFp\Rules\Classes;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\IdentifierRuleError;

class DisallowClassesRule implements Rule
{
    private bool $disallowClasses;

    public function __construct(bool $disallowClasses)
    {
        $this->disallowClasses = $disallowClasses;
    }

    public function getNodeType(): string
    {
        return Class_::class;
    }

    /**
     * @param Class_ $node
     * @param Scope $scope
     * @return IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowClasses) {
            return [];
        }

        $errorMessage = 'Should not use classes';

        return [
            RuleErrorBuilder::message($errorMessage)
                ->identifier('PHPStanFp.disallowClasses')
                ->build()
        ];
    }
}
