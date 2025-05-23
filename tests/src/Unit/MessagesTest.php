<?php

declare(strict_types=1);

namespace Spiral\Validator\Tests\Unit;

final class MessagesTest extends BaseTestCase
{
    public function testDefault(): void
    {
        $validator = $this->validation->validate([], ['name' => ['type::notEmpty']]);
        $this->assertSame(['name' => 'This value is required.'], $validator->getErrors());
    }

    public function testWithData(): void
    {
        $validator = $this->validation->validate([], ['name' => ['type::notEmpty']]);
        $this->assertSame(['name' => 'This value is required.'], $validator->getErrors());

        $validator = $validator->withData([]);
        $this->assertSame(['name' => 'This value is required.'], $validator->getErrors());

        $validator = $validator->withData(['name' => 'John']);
        $this->assertEmpty($validator->getErrors());
    }

    public function testMessage(): void
    {
        $validator = $this->validation->validate([], [
            'name' => [
                ['type::notEmpty', 'message' => 'Value is empty.'],
            ],
        ]);
        $this->assertSame(['name' => 'Value is empty.'], $validator->getErrors());
    }

    public function testMsg(): void
    {
        $validator = $this->validation->validate([], [
            'name' => [
                ['type::notEmpty', 'msg' => 'Value is empty.'],
            ],
        ]);
        $this->assertSame(['name' => 'Value is empty.'], $validator->getErrors());
    }

    public function testError(): void
    {
        $validator = $this->validation->validate([], [
            'name' => [
                ['type::notEmpty', 'error' => 'Value is empty.'],
            ],
        ]);
        $this->assertSame(['name' => 'Value is empty.'], $validator->getErrors());
    }

    public function testErr(): void
    {
        $validator = $this->validation->validate([], [
            'name' => [
                ['type::notEmpty', 'err' => 'Value is empty.'],
            ],
        ]);
        $this->assertSame(['name' => 'Value is empty.'], $validator->getErrors());
    }
}
