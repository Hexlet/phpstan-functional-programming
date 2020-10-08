<?php

namespace Hexlet\PHPStanFp\Rules\Classes;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PhpParser\Node\Stmt\ClassMethod;

class DisallowGetSetRule implements Rule
{
    private bool $disallowGetSet;

    public function __construct(bool $disallowGetSet)
    {
        $this->disallowGetSet = $disallowGetSet;
    }

    public function getNodeType(): string
    {
        return ClassMethod::class;
    }
    
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod $node
     * @param \PHPStan\Analyser\Scope $scope
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowGetSet || !$node->isMagic()) {
            return [];
        }

        // var_dump($node->getSubNodeNames());
        switch ($node->name->name) {
            case '__set':
                return ['Should not use magic method __set'];
            case '__get':
                return ['Should not use magic method __get'];
            default:
                return [];
        }
    }
}
