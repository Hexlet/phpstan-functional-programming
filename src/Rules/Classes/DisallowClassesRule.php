<?php

namespace Hexlet\PHPStanFp\Rules\Classes;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\Class_;

class DisallowClassesRule implements Rule
{
    private bool $disallowClasses;

    public function __construct(bool $disallowClasses)
    {
        $this->disallowClasses = $disallowClasses;
    }

    public function getNodeType(): string
    {
        return Class_::class;
    }

    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     * @param \PHPStan\Analyser\Scope $scope
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowClasses) {
            return [];
        }
        return ['Should not use classes'];
    }
}
