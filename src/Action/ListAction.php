<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_METHOD)]
class ListAction
{
    public function __construct(
        public ?string $title = null, // 操作权限的名称
        public ?string $showExpression = null, // 显示规则
    ) {
    }
}
