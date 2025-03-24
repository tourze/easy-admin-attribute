<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Deletable
{
    public function __construct(
        public bool $softDelete = false, // 是否进行软删除
        public string $deleteColumn = 'deleted',
        public string $title = '删除',
        public string $isShowColumn = '', // 是否可见
        public bool $inverse = false, // 判断是否删除的逻辑值反转
    ) {
    }
}
