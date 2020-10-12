<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\PreInc;

class PreIncRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return PreInc::class;
    }
}
