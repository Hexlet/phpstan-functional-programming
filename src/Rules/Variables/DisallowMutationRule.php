<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;

abstract class DisallowMutationRule implements Rule
{
    private bool $disallowVariablesMutation;

    public function __construct(bool $disallowVariablesMutation)
    {
        $this->disallowVariablesMutation = $disallowVariablesMutation;
    }

    /**
     * @param \PhpParser\Node\Expr $node
     * @param \PHPStan\Analyser\Scope $scope
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowVariablesMutation) {
            return [];
        }

        if (isset($node->var) && $scope->hasVariableType($node->var->name)->yes()) {
            return ['Forbid the use of mutating operators'];
        }

        return [];
    }
}
