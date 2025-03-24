<?php

namespace Tourze\EasyAdmin\Attribute\Action;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Copyable
{
    public function __construct(
        public string $title = '复制',
        public readonly string $alert = '是否确认要复制？',
    ) {
    }
}
