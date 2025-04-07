<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\IdentifierRuleError;

abstract class DisallowLoopsRule implements Rule
{
    private bool $disallowLoops;

    public function __construct(bool $disallowLoops)
    {
        $this->disallowLoops = $disallowLoops;
    }

    /**
     * @param Node $node
     * @param Scope $scope
     * @return IdentifierRuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowLoops) {
            return [];
        }

        return [
            RuleErrorBuilder::message("Should not use loop {$this->getLoopType()}")
                ->identifier('PHPStanFp.disallowLoops')
                ->build()
        ];
    }

    abstract protected function getLoopType(): string;
}
