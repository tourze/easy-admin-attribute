<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Creatable
{
    public function __construct(
        public string $title = '新建',
        public string $buttonType = 'primary',
        public string $icon = '', // icon图标：plus
        public int $drawerWidth = 640,
        public string $actionType = 'diy-drawer', // 创建方式，默认抽屉diy-drawer，也有一些是modalForm/redirectRoute
        public string $route = '',
        public string $isShowColumn = '' // 是否可见
    ) {
    }
}
