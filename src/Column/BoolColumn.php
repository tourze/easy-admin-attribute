<?php

namespace Tourze\EasyAdmin\Attribute\Column;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class BoolColumn
{
    public function __construct(
        public readonly string|bool $suffix = false,
        public readonly ?string $fixedValue = null,
    ) {
    }
}
