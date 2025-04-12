<?php

namespace Tourze\EasyAdmin\Attribute\Field;

/**
 * 标记字段是联动事件，只要一有变更，就触发事件
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class LinkageField
{
}
