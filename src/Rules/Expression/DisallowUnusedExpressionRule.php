<?php

namespace Hexlet\PHPStanFp\Rules\Expression;

use PhpParser\Node;
use PhpParser\Node\Stmt\Expression;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

class DisallowUnusedExpressionRule implements Rule
{
    private bool $disallowUnusedExpression;

    public function __construct(bool $disallowUnusedExpression)
    {
        $this->disallowUnusedExpression = $disallowUnusedExpression;
    }

    public function getNodeType(): string
    {
        return Expression::class;
    }

    /**
     * @param \PhpParser\Node\Stmt\Expression $node
     * @param \PHPStan\Analyser\Scope $scope
     * @return \PHPStan\Rules\IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowUnusedExpression) {
            return [];
        }

        if (isset($node->expr->var)) {
            return [];
        }

        return [
            RuleErrorBuilder::message('Enforce that an expression gets used')
                ->identifier('PHPStanFp.disallowUnusedExpression')
                ->build()
        ];
    }
}
