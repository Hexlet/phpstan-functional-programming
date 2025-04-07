<?php

namespace Hexlet\PHPStanFp\Rules\Exceptions;

use PhpParser\Node;
use PhpParser\Node\Expr\Throw_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\IdentifierRuleError;

class DisallowThrowRule implements Rule
{
    private bool $disallowThrow;

    public function __construct(bool $disallowThrow)
    {
        $this->disallowThrow = $disallowThrow;
    }

    public function getNodeType(): string
    {
        return Throw_::class;
    }

    /**
     * @param Throw_ $node
     * @param Scope $scope
     * @return IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowThrow) {
            return [];
        }

        $errorMessage = 'Should not use throw';

        return [
            RuleErrorBuilder::message($errorMessage)
                ->identifier('phpstanFunctionalProgramming.disallowThrow')
                ->build()
        ];
    }
}
