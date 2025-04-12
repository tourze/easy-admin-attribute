<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\ExportColumn;

class ExportColumnTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $exportColumn = new ExportColumn();

        // 根据ExportColumn.php中的默认值测试
        $this->assertNull($exportColumn->dataIndex);
        $this->assertNull($exportColumn->title);
        $this->assertEquals(30, $exportColumn->width);
        $this->assertNull($exportColumn->sort);
    }

    public function testCustomValues(): void
    {
        $exportColumn = new ExportColumn(
            dataIndex: 'username',
            title: '用户名',
            width: 50,
            sort: 1
        );

        $this->assertEquals('username', $exportColumn->dataIndex);
        $this->assertEquals('用户名', $exportColumn->title);
        $this->assertEquals(50, $exportColumn->width);
        $this->assertEquals(1, $exportColumn->sort);
    }
}
