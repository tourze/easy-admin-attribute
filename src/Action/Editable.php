<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Editable
{
    public function __construct(
        public int|string $drawerWidth = 640,
        public string $title = '编辑',
        public string $actionType = 'diy-drawer', // 编辑方式，默认抽屉diy-drawer，也有一些是modalForm/redirectRoute
        public string $route = '',
        public string $isShowColumn = '', // 是否可见
    ) {
    }
}
