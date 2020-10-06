<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node\Stmt\Foreach_;

class ForeachRule extends DisallowLoopsRule
{
    public function getNodeType(): string
    {
        return Foreach_::class;
    }
    
    protected function getLoopType(): string
    {
        return 'foreach';
    }
}
