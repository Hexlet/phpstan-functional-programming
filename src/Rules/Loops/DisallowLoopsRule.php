<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

abstract class DisallowLoopsRule implements Rule
{
    private bool $disallowLoops;

    public function __construct(bool $disallowLoops)
    {
        $this->disallowLoops = $disallowLoops;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->disallowLoops) {
            return [];
        }

        return [
            RuleErrorBuilder::message("Should not use loop {$this->getLoopType()}")->build()
        ];
    }

    abstract protected function getLoopType(): string;
}
