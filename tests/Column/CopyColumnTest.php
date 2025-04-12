<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\CopyColumn;

class CopyColumnTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $copyColumn = new CopyColumn();

        // 根据CopyColumn.php中的默认值测试
        $this->assertFalse($copyColumn->suffix);
        $this->assertNull($copyColumn->fixedValue);
    }

    public function testCustomStringValues(): void
    {
        $copyColumn = new CopyColumn(
            suffix: '点击复制',
            fixedValue: '1'
        );

        $this->assertEquals('点击复制', $copyColumn->suffix);
        $this->assertEquals('1', $copyColumn->fixedValue);
    }

    public function testCustomBoolValue(): void
    {
        $copyColumn = new CopyColumn(
            suffix: true,
            fixedValue: null
        );

        $this->assertTrue($copyColumn->suffix);
        $this->assertNull($copyColumn->fixedValue);
    }
}
