<?php

namespace Tourze\EasyAdmin\Attribute\Column;

/**
 * 声明该字段是否可导入
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ImportColumn
{
    public function __construct(
        public readonly string $title = '', // 导入字段名
        public readonly string $comment = '' // 导入字段批注
    ) {
    }
}
