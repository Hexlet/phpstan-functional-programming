<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node\Stmt\Do_;

class DoWhileRule extends DisallowLoopsRule
{
    public function getNodeType(): string
    {
        return Do_::class;
    }

    protected function getLoopType(): string
    {
        return 'do-while';
    }
}
