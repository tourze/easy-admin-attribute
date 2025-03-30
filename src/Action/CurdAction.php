<?php

namespace Tourze\EasyAdmin\Attribute\Action;

/**
 * 支持展开的子CURD页面
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class CurdAction
{
    public function __construct(
        public string $label = '',
        public string $drawerWidth = '0', // 弹出抽屉宽度
        public ?string $showExpression = null, // 显示规则
    ) {
    }
}
