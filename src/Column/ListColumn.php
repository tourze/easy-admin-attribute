<?php

namespace Tourze\EasyAdmin\Attribute\Column;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class ListColumn
{
    public function __construct(
        public ?int $order = null, // 排序
        public ?string $title = null, // 标题
        public bool $queryCount = false, // 计算总数
        public bool $sorter = false, // 是否支持排序
        public string $columnType = 'text', // 渲染类型
        public int $width = 0, // 宽度
        public ?string $showExpression = null, // 显示规则
        public ?string $totalType = null, // 计算类型sum(求和)、average(平均值)
        public ?string $totalExpression = null, // 自由表达式
        public ?string $tooltipDesc = null, // 自由表达式
        public ?bool $fixed = null, // 是否固定
        public ?string $displayTemplate = null, // TODO 自定义显示模板
    ) {
    }

    public const TOTAL_SUM = 'sum';

    public const TOTAL_AVG = 'average';

    public const TOTAL_EXP = 'expression';
}
