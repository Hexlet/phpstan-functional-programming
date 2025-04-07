<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

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
                return [
                    RuleErrorBuilder::message($errorMessage)->build()
                ];
            case 'Expr_List':
                $containsTypedItems = collect($node->var->items)
                    ->map(fn($item) => $item->value->name)
                    ->filter(fn($name) => !is_null($name))
                    ->contains(fn($name) => $scope->hasVariableType($name)->yes());

                return $containsTypedItems ? [RuleErrorBuilder::message($errorMessage)->build()] : [];

            case 'Expr_Variable':
                return $scope->hasVariableType($node->var->name)->yes()
                    ? [RuleErrorBuilder::message($errorMessage)->build()]
                    : [];
            default:
                return [];
        }
    }
}
