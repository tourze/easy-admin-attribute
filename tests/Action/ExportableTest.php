<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Exportable;

class ExportableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $exportable = new Exportable();

        // 测试默认值
        $this->assertEquals('export-excel-by-exceljs', $exportable->type);
        $this->assertEquals('导出列表数据', $exportable->label);
        $this->assertEquals('', $exportable->fileName);
        $this->assertTrue($exportable->needCondition);
        $this->assertEquals(['a.id' => 'DESC'], $exportable->sortColumn);
        $this->assertEquals([], $exportable->filters);
    }

    public function testCustomValues(): void
    {
        $exportable = new Exportable(
            type: 'export-csv',
            label: '导出CSV',
            fileName: 'data-export',
            needCondition: false,
            sortColumn: ['a.created_at' => 'ASC'],
            filters: ['status' => 1]
        );

        $this->assertEquals('export-csv', $exportable->type);
        $this->assertEquals('导出CSV', $exportable->label);
        $this->assertEquals('data-export', $exportable->fileName);
        $this->assertFalse($exportable->needCondition);
        $this->assertEquals(['a.created_at' => 'ASC'], $exportable->sortColumn);
        $this->assertEquals(['status' => 1], $exportable->filters);
    }

    public function testSortColumnModification(): void
    {
        $exportable = new Exportable();

        // 测试 sortColumn 不是只读的，可以修改
        $newSortColumn = ['a.name' => 'ASC'];
        $exportable->sortColumn = $newSortColumn;

        $this->assertEquals($newSortColumn, $exportable->sortColumn);
    }

    public function testAttributeMetadata(): void
    {
        // 测试属性元数据
        $reflectionClass = new \ReflectionClass(Exportable::class);
        $attributes = $reflectionClass->getAttributes();

        $this->assertCount(1, $attributes);
        $this->assertEquals(\Attribute::class, $attributes[0]->getName());

        $attributeArgs = $attributes[0]->getArguments();
        $this->assertContains(\Attribute::TARGET_CLASS, $attributeArgs);
    }
}
