<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node\Stmt\For_;

class ForRule extends DisallowLoopsRule
{
    public function getNodeType(): string
    {
        return For_::class;
    }

    protected function getLoopType(): string
    {
        return 'for';
    }
}
