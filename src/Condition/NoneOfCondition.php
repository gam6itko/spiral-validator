<?php

declare(strict_types=1);

namespace Spiral\Validator\Condition;

use Spiral\Validation\ValidatorInterface;
use Spiral\Validator\AbstractCondition;

class NoneOfCondition extends AbstractCondition
{
    public function __construct(
        private Compositor $compositor,
    ) {}

    public function isMet(ValidatorInterface $validator, string $field, mixed $value): bool
    {
        foreach ($this->compositor->makeConditions($field, $this->options) as $condition) {
            if ($condition->isMet($validator, $field, $value)) {
                return false;
            }
        }

        return true;
    }
}
