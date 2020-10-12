<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\AssignOp;

class AssignOpRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return AssignOp::class;
    }
}
