<?php

namespace Hexlet\PHPStanFp\Rules\Classes;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\ClassLike;

class DisallowClassesRule implements Rule
{
    /**
     * @var array<string>
     */
    private $allowedClasses;

    /**
     * @param array<string> $allowedClasses
     */
    public function __construct(array $allowedClasses)
    {
        $this->allowedClasses = $allowedClasses;
    }

    public function getNodeType(): string
    {
        return ClassLike::class;
    }
    
    public function processNode(Node $node, Scope $scope): array
    {
        if (in_array('all', $this->allowedClasses)) {
            return [];
        }

        if ($node->isAbstract()) {
            if (in_array('abstract', $this->allowedClasses)) {
                return [];
            }
            return ['Should not use abstract classes'];
        }
        
        if ($node->isFinal()) {
            if (in_array('final', $this->allowedClasses)) {
                return [];
            }
            return ['Should not use final classes'];
        }
        
        if (in_array('classes', $this->allowedClasses)) {
            return [];
        }
        return ['Should not use classes'];
    }
}
