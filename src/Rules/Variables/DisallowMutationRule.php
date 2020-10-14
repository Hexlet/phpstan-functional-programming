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

        if (!isset($node->var)) {
            return [];
        }

        $errorMessage = 'Should not use of mutating operators';

        switch ($node->var->getType()) {
            case 'Expr_ArrayDimFetch':
                return [$errorMessage];

            case 'Expr_Array':
                $containsTypedItems = collect($node->var->items)
                    ->map(fn($item) => $item->value->name)
                    ->contains(fn($name) => $scope->hasVariableType($name)->yes());
                return $containsTypedItems ? [$errorMessage] : [];

            case 'Expr_Variable':
                return $scope->hasVariableType($node->var->name)->yes() ? [$errorMessage] : [];

            default:
                return [];
        }
    }
}
