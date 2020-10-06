<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node\Stmt\While_;

class WhileRule extends DisallowLoopsRule
{
    public function getNodeType(): string
    {
        return While_::class;
    }
    
    protected function getLoopType(): string
    {
        return 'while';
    }
}
