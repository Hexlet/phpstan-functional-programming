<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\PostDec;

class PostDecRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return PostDec::class;
    }
}
