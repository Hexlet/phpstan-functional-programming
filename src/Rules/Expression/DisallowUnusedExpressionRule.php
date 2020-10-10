<?php

namespace Hexlet\PHPStanFp\Rules\Expression;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\Expression;

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
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowUnusedExpression) {
            return [];
        }

        if (isset($node->expr->var)) {
            return [];
        }

        return ['Enforce that an expression gets used'];
    }
}
