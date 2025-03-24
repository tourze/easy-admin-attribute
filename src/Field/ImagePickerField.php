<?php

namespace Tourze\EasyAdmin\Attribute\Field;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ImagePickerField
{
    public function __construct(
        public readonly int $limit = 1,
    )
    {
    }
}
