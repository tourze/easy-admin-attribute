<?php

namespace Tourze\EasyAdmin\Attribute\Filter;

/**
 * 标记该字段支持模糊搜索
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class Keyword
{
    public function __construct(
        public int $inputWidth = 0, // 输入长度
        public ?string $name = null,
        public ?string $label = null,
    ) {
    }
}
