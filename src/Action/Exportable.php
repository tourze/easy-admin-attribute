<?php

namespace Tourze\EasyAdmin\Attribute\Action;

/**
 * 声明这个模型可导出
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Exportable
{
    public function __construct(
        public readonly string $type = 'export-excel-by-exceljs',
        public readonly string $label = '导出列表数据',
        public readonly string $fileName = '', // 导出的文件名称
        public readonly bool $needCondition = true, // 是否需要条件才能导出，默认为true，兼容之前的设定(这里貌似都是声明前端的配置，这个放在这里合适吗？)
        public array $sortColumn = ['a.id' => 'DESC'],
        public readonly array $filters = [],
    ) {
    }
}
