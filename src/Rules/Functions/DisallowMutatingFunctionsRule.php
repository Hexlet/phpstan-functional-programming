<?php

namespace Hexlet\PHPStanFp\Rules\Functions;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Expr\FuncCall;

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
     * @param \PhpParser\Node\Expr\FuncCall $node
     * @param \PHPStan\Analyser\Scope $scope
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowMutatingFunctions) {
            return [];
        }

        if (!$node->name instanceof \PhpParser\Node\Name\FullyQualified) {
            return [];
        }

        $name = $node->name->getFirst();
        if (!in_array($name, $this->mutatingFunctionsNames)) {
            return [];
        }

        return ["The use of function '{$name}' is not allowed as it might be a mutating function"];
    }
}
