<?php

namespace Hexlet\PHPStanFp\Rules\Loops;

use PHPStan\Rules\Rule;
use PhpParser\Node;
use PHPStan\Analyser\Scope;

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

        return ["Should not use loop {$this->getLoopType()}"];
    }

    abstract protected function getLoopType(): string;
}
