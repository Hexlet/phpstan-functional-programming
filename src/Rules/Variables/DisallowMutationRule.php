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

        // if (isset($node->expr->var)) {
        //     return [];
        // }

        // var_dump($node);
        // var_dump($node->var);
        // if (in_array($node->var, $this->hash)) {
        //     var_dump('yes');
        // } else {
        //     $this->hash[] = $node->var;
        //     var_dump(spl_object_id($node->var));
        // }

        // var_dump($node->byRef);
        // var_dump($node->var->name);
        // var_dump($node->getAttribute('startLine'));
        // $variableType = $scope->getVariableType($node->var->name);
        // var_dump($variableType);
        // $parent = $node->getAttribute('parent');
        // if ($parent->hasAttribute('previous')) {
        //     $previous = $parent->getAttribute('previous');
        //     var_dump($previous->expr->var->getAttribute('next')->getAttribute('phpstan_cache_printer'));
        // }
        
        if (isset($node->var) && $scope->hasVariableType($node->var->name)->yes()) {
            return ['Forbid the use of mutating operators'];
        }

        return [];
    }
}
