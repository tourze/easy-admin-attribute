<?php

namespace Tourze\EasyAdmin\Attribute\Column;

/**
 * 声明该字段是否可导出
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class ExportColumn
{
    public function __construct(
        public readonly ?string $dataIndex = null,
        public readonly ?string $title = null, // 导出标题
        public readonly int $width = 30, // 单元格宽度
        public readonly ?int $sort = null // 自定义表头排序
    ) {
    }
}
