<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\PreDec;

class PreDecRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return PreDec::class;
    }
}
