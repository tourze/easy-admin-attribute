<?php

namespace Tourze\EasyAdmin\Attribute\Field;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class FormField
{
    public function __construct(
        public string $id = '', // 自定义参数ID
        public string $title = '', // 标题
        public int $span = 24, // 界面长度
        public ?int $order = null, // 排序
        public bool $required = false, // 是否必填
        public $defaultValue = null, // 默认值
        public bool $canEdit = true, // 是否可编辑，有些是不可编辑的
        public ?string $prefixDivider = null, // 前面的分隔符
        public bool $allowRemote = false, // 如果总数据条数大于20，则会自动开启远程加载模式
        public ?int $remoteLimit = null,
        public ?string $showExpression = null, // 显示规则
        public ?string $optionWhere = null // 附加的查询条件
    ) {
    }
}
