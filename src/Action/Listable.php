<?php

namespace Tourze\EasyAdmin\Attribute\Action;

/**
 * 当需要使用这个注解，需要在用到的字段那里都补充上 admin_curd 这个group，让开发者尽可能控制输出的数据体积
 *
 * @see https://blog.csdn.net/weixin_47454566/article/details/119564578 antd table自适应（横向滚动条）
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Listable
{
    public const MAX_CONTENT = 'max-content';

    public function __construct(
        public bool $showPagination = true, // 是否显示分页
        public int $actionWidth = 0, // 操作宽度
        public int|string $scrollX = self::MAX_CONTENT, // 滚动偏移？
        public bool $showTotal = false, // 是否显示总计
        public string $totalTitleColumn = 'id',
        public array $sortColumn = ['id' => 'DESC']
    ) {
    }
}
