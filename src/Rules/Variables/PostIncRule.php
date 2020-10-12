<?php

namespace Hexlet\PHPStanFp\Rules\Variables;

use PhpParser\Node\Expr\PostInc;

class PostIncRule extends DisallowMutationRule
{
    public function getNodeType(): string
    {
        return PostInc::class;
    }
}
