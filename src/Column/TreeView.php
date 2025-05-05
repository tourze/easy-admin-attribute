<?php

namespace Tourze\EasyAdmin\Attribute\Column;

#[\Attribute(\Attribute::TARGET_CLASS)]
class TreeView
{
    public function __construct(
        public int $width = 300, // 树的宽度
        public $dataModel = null, // 数据来源
        public $sourceAttribute = null, // 数据来源字段
        public string $targetAttribute = 'parent', // 在查询时，会在当前模型中带上指定指定字段
        public bool $showNoChildrenNode = true, // 在一些场景中，我们需要隐藏那些没下级的节点，通过这个参数来控制
        public string $group = 'api_tree',
    ) {
    }
}
