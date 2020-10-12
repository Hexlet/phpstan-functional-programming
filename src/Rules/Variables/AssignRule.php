<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\Assign;

class AssignRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return Assign::class;
    }
}
