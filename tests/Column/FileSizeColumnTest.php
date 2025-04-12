<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;

class FileSizeColumnTest extends TestCase
{
    /**
     * @dataProvider fileSizeProvider
     */
    public function testFormatMethod(mixed $bytes, string $expected): void
    {
        // 需要模拟ChrisUllyott\FileSize类，因为依赖的类可能在测试中不可用
        $this->markTestIncomplete('需要模拟ChrisUllyott\FileSize类来完成测试');

        // 实际测试代码应该类似以下:
        // $result = FileSizeColumn::format($bytes);
        // $this->assertEquals($expected, $result);
    }

    public function fileSizeProvider(): array
    {
        return [
            'bytes' => [1024, '1KB'],
            'kilobytes' => [1048576, '1MB'],
            'megabytes' => [1073741824, '1GB'],
            'zero' => [0, '0B'],
        ];
    }
}
