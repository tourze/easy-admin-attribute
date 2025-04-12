<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\BoolColumn;

class BoolColumnTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $boolColumn = new BoolColumn();

        // 根据BoolColumn.php中的默认值测试
        $this->assertFalse($boolColumn->suffix);
        $this->assertNull($boolColumn->fixedValue);
    }

    public function testCustomStringValues(): void
    {
        $boolColumn = new BoolColumn(
            suffix: '状态',
            fixedValue: '1'
        );

        $this->assertEquals('状态', $boolColumn->suffix);
        $this->assertEquals('1', $boolColumn->fixedValue);
    }

    public function testCustomBoolValue(): void
    {
        $boolColumn = new BoolColumn(
            suffix: true,
            fixedValue: null
        );

        $this->assertTrue($boolColumn->suffix);
        $this->assertNull($boolColumn->fixedValue);
    }
}
