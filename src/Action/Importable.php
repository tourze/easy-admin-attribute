<?php

namespace Tourze\EasyAdmin\Attribute\Action;

/**
 * 声明这个模型可导入的
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Importable
{
    public function __construct(
        public bool $generateTemplate = true, // 是否支持自动生成模板
        public string $title = '导入',
        public ?string $featureKey = null,
    ) {
    }
}
