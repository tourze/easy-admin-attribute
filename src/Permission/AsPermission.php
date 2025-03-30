<?php

namespace Tourze\EasyAdmin\Attribute\Permission;

/**
 * 声明需要权限管理
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class AsPermission
{
    public function __construct(
        public string $name = '', // 名称
        public string $title = '', // 标题
        public string $titleOverrideEnv = '',
        public array $children = [], // 自定义下级权限
        public array $includes = [], // 包含权限集，例如 A hasMany B，这个时候我们可以在这里声明B，那样子在权限那里就会在 A 的同层包含 B
    ) {
        if (!empty($this->titleOverrideEnv) && isset($_ENV[$this->titleOverrideEnv])) {
            $this->title = strval($_ENV[$this->titleOverrideEnv]);
        }
    }
}
