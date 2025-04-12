<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\ListColumn;

class ListColumnTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $listColumn = new ListColumn();

        $this->assertNull($listColumn->order);
        $this->assertNull($listColumn->title);
        $this->assertFalse($listColumn->queryCount);
        $this->assertFalse($listColumn->sorter);
        $this->assertEquals('text', $listColumn->columnType);
        $this->assertEquals(0, $listColumn->width);
        $this->assertNull($listColumn->showExpression);
        $this->assertNull($listColumn->totalType);
        $this->assertNull($listColumn->totalExpression);
        $this->assertNull($listColumn->tooltipDesc);
        $this->assertNull($listColumn->fixed);
        $this->assertNull($listColumn->displayTemplate);
    }

    public function testCustomValues(): void
    {
        $listColumn = new ListColumn(
            order: 1,
            title: '自定义列',
            queryCount: true,
            sorter: true,
            columnType: 'number',
            width: 120,
            showExpression: 'field > 0',
            totalType: ListColumn::TOTAL_SUM,
            totalExpression: 'SUM(field)',
            tooltipDesc: '提示信息',
            fixed: true,
            displayTemplate: 'custom_template'
        );

        $this->assertEquals(1, $listColumn->order);
        $this->assertEquals('自定义列', $listColumn->title);
        $this->assertTrue($listColumn->queryCount);
        $this->assertTrue($listColumn->sorter);
        $this->assertEquals('number', $listColumn->columnType);
        $this->assertEquals(120, $listColumn->width);
        $this->assertEquals('field > 0', $listColumn->showExpression);
        $this->assertEquals(ListColumn::TOTAL_SUM, $listColumn->totalType);
        $this->assertEquals('SUM(field)', $listColumn->totalExpression);
        $this->assertEquals('提示信息', $listColumn->tooltipDesc);
        $this->assertTrue($listColumn->fixed);
        $this->assertEquals('custom_template', $listColumn->displayTemplate);
    }

    public function testTotalConstants(): void
    {
        $this->assertEquals('sum', ListColumn::TOTAL_SUM);
        $this->assertEquals('average', ListColumn::TOTAL_AVG);
        $this->assertEquals('expression', ListColumn::TOTAL_EXP);
    }
}
