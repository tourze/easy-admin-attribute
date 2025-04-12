<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Filter\Filterable;
use Tourze\EasyAdmin\Attribute\Filter\Keyword;

class FilterTest extends TestCase
{
    public function testFilterableDefaults(): void
    {
        $filterable = new Filterable();

        $this->assertEquals('', $filterable->label);
        $this->assertEquals(0, $filterable->inputWidth);
        $this->assertEquals('', $filterable->placeholder);
        $this->assertEquals('', $filterable->dataModel);
        $this->assertEquals([], $filterable->dataParams);
        $this->assertEquals([], $filterable->dataOrder);
        $this->assertEquals('', $filterable->filterQueryMethod);
        $this->assertEquals('input', $filterable->fieldType);
        $this->assertNull($filterable->enumList);
        $this->assertEquals('', $filterable->columnName);
        $this->assertTrue($filterable->like);
        $this->assertNull($filterable->order);
    }

    public function testFilterableCustomValues(): void
    {
        $filterable = new Filterable(
            label: '搜索标签',
            inputWidth: 200,
            placeholder: '请输入关键词',
            dataModel: 'App\\Model\\User',
            dataParams: ['status' => 1],
            dataOrder: ['id' => 'DESC'],
            filterQueryMethod: 'customFilter',
            fieldType: 'select',
            enumList: ['1' => '是', '0' => '否'],
            columnName: 'custom_column',
            like: false,
            order: 1
        );

        $this->assertEquals('搜索标签', $filterable->label);
        $this->assertEquals(200, $filterable->inputWidth);
        $this->assertEquals('请输入关键词', $filterable->placeholder);
        $this->assertEquals('App\\Model\\User', $filterable->dataModel);
        $this->assertEquals(['status' => 1], $filterable->dataParams);
        $this->assertEquals(['id' => 'DESC'], $filterable->dataOrder);
        $this->assertEquals('customFilter', $filterable->filterQueryMethod);
        $this->assertEquals('select', $filterable->fieldType);
        $this->assertEquals(['1' => '是', '0' => '否'], $filterable->enumList);
        $this->assertEquals('custom_column', $filterable->columnName);
        $this->assertFalse($filterable->like);
        $this->assertEquals(1, $filterable->order);
    }

    public function testKeywordDefaults(): void
    {
        $keyword = new Keyword();

        $this->assertEquals(0, $keyword->inputWidth);
        $this->assertNull($keyword->name);
        $this->assertNull($keyword->label);
    }

    public function testKeywordCustomValues(): void
    {
        $keyword = new Keyword(
            inputWidth: 200,
            name: 'search_keyword',
            label: '搜索标签'
        );

        $this->assertEquals(200, $keyword->inputWidth);
        $this->assertEquals('search_keyword', $keyword->name);
        $this->assertEquals('搜索标签', $keyword->label);
    }
}
