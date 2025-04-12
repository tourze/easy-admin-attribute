<?php

namespace Tourze\EasyAdmin\Attribute\Event;

/**
 * 过滤时触发方法
 */
#[\Attribute(\Attribute::TARGET_METHOD)]
class OnFilterQuery
{
    public function __construct(
        public readonly string $placeholder = '', // 提示文案
        public readonly string $inputWidth = '' // 输入框长度
    ) {
    }
}
