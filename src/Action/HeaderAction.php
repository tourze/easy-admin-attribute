<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_METHOD)]
class HeaderAction
{
    public function __construct(
        public $title = null, // 操作权限的名称
        public ?string $featureKey = null, // 如果有配置，则会通过这个key来检查
    ) {
    }
}
