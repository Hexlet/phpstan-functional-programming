<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\IdentifierRuleError;

abstract class DisallowMutationRule implements Rule
{
    private bool $disallowVariablesMutation;

    public function __construct(bool $disallowVariablesMutation)
    {
        $this->disallowVariablesMutation = $disallowVariablesMutation;
    }

    /**
     * @param Node $node
     * @param Scope $scope
     * @return IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowVariablesMutation) {
            return [];
        }

        if (!isset($node->var)) {
            return [];
        }

        switch ($node->var->getType()) {
            case 'Expr_ArrayDimFetch':
                return [
                    $this->buildError()
                ];
            case 'Expr_List':
                $containsTypedItems = collect($node->var->items)
                    ->map(fn($item) => $item->value->name)
                    ->filter(fn($name) => !is_null($name))
                    ->contains(fn($name) => $scope->hasVariableType($name)->yes());

                return $containsTypedItems
                    ? [$this->buildError()]
                    : [];

            case 'Expr_Variable':
                return $scope->hasVariableType($node->var->name)->yes()
                    ? [$this->buildError()]
                    : [];
            default:
                return [];
        }
    }
    private function buildError(): IdentifierRuleError
    {
        $errorMessage = 'Should not use of mutating operators';

        return RuleErrorBuilder::message($errorMessage)
            ->identifier('phpstanFunctionalProgramming.disallowVariablesMutation')
            ->build();
    }
}
