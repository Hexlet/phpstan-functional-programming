<?php

namespace Hexlet\PHPStanFp\Rules\Classes;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\ClassLike;

class DisallowClassesRule implements Rule
{
    public function getNodeType(): string
    {
        return ClassLike::class;
    }
    
    public function processNode(Node $node, Scope $scope): array
    {
        return ["Don't use any classes"];
    }
}
