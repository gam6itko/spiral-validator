<?php

declare(strict_types=1);

namespace Spiral\Validator\Tests\Fixtures;

use Spiral\Validator\AbstractChecker;

class TestChecker extends AbstractChecker
{
    public function test(): bool
    {
        return false;
    }
}
