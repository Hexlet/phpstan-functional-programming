<?php

namespace Hexlet\PHPStanFp\Rules\Exceptions;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\Throw_;

class DisallowThrowRule implements Rule
{
    private bool $disallowThrow;

    public function __construct(bool $disallowThrow)
    {
        $this->disallowThrow = $disallowThrow;
    }

    public function getNodeType(): string
    {
        return Throw_::class;
    }
    
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowThrow) {
            return [];
        }
        return ['Should not use throw'];
    }
}
