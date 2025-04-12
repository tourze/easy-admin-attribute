<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Copyable;

class CopyableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $copyable = new Copyable();

        // 根据Copyable.php中的默认值测试
        $this->assertEquals('复制', $copyable->title);
        $this->assertEquals('是否确认要复制？', $copyable->alert);
    }

    public function testCustomValues(): void
    {
        $copyable = new Copyable(
            title: '克隆',
            alert: '确认克隆此记录？'
        );

        $this->assertEquals('克隆', $copyable->title);
        $this->assertEquals('确认克隆此记录？', $copyable->alert);
    }
}
