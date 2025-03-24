<?php

namespace Tourze\EasyAdmin\Attribute\Filter;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD)]
class Filterable
{
    public function __construct(
        public string $label = '',
        public $inputWidth = 0,
        public string $placeholder = '',
        public string $dataModel = '',
        public $dataParams = [],
        public $dataOrder = [],
        public $filterQueryMethod = '',
        public string $fieldType = 'input',
        public ?array $enumList = null, // 关联的枚举列表，格式是 ["k" => "v"]
        public string $columnName = '',
        public bool $like = true,
        public $order = null
    ) {
    }
}
