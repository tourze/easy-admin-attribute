<?php

namespace Tourze\EasyAdmin\Attribute\Action;

/**
 * 批量删除
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class BatchDeletable
{
    public function __construct(
        public readonly bool $softDelete = false, // 是否进行软删除
        public readonly string $deleteColumn = 'deleted', // 软删除更新字段
        public readonly string $title = '删除',
        public readonly mixed $isShowColumn = '', // 是否可见
        public readonly bool $inverse = false // 判断是否删除的逻辑值反转
    ) {
    }
}
