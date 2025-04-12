<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\ImportColumn;

class ImportColumnTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $importColumn = new ImportColumn();

        // 根据ImportColumn.php中的默认值测试
        $this->assertEquals('', $importColumn->title);
        $this->assertEquals('', $importColumn->comment);
    }

    public function testCustomValues(): void
    {
        $importColumn = new ImportColumn(
            title: '用户名',
            comment: '请输入用户名，长度不超过20个字符'
        );

        $this->assertEquals('用户名', $importColumn->title);
        $this->assertEquals('请输入用户名，长度不超过20个字符', $importColumn->comment);
    }
}
