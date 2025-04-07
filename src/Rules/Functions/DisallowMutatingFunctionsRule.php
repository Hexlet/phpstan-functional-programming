<?php

namespace Hexlet\PHPStanFp\Rules\Functions;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\IdentifierRuleError;

class DisallowMutatingFunctionsRule implements Rule
{
    private bool $disallowMutatingFunctions;

    /**
     * @var array<string>
     */
    private array $mutatingFunctionsNames = [
        'array_multisort',
        'array_pop',
        'array_push',
        'array_shift',
        'array_splice',
        'array_unshift',
        'arsort',
        'asort',
        'krsort',
        'ksort',
        'natcasesort',
        'natsort',
        'rsort',
        'shuffle',
        'sort',
        'uasort',
        'uksort',
        'usort',
    ];

    public function __construct(bool $disallowMutatingFunctions)
    {
        $this->disallowMutatingFunctions = $disallowMutatingFunctions;
    }

    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    /**
     * @param FuncCall $node
     * @param Scope $scope
     * @return IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowMutatingFunctions) {
            return [];
        }

        if (!$node->name instanceof \PhpParser\Node\Name) {
            return [];
        }

        $name = $node->name->getFirst();

        if (!in_array($name, $this->mutatingFunctionsNames)) {
            return [];
        }

        $errorMessage = "The use of function '{$name}' is not allowed as it might be a mutating function";

        return [
            RuleErrorBuilder::message($errorMessage)
                ->identifier('PHPStanFp.disallowMutatingFunctions')
                ->build()
        ];
    }
}
