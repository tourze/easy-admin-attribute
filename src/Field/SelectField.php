<?php

namespace Tourze\EasyAdmin\Attribute\Field;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class SelectField
{
    public function __construct(
        public string $targetEntity = '',
        public string $mode = '',
        public string $idColumn = 'id',
        public string $orderColumn = 'id',
    ) {
    }
}
