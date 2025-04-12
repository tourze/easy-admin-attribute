<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Deletable;

class DeletableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $deletable = new Deletable();

        // 根据Deletable.php中的默认值测试
        $this->assertFalse($deletable->softDelete);
        $this->assertEquals('deleted', $deletable->deleteColumn);
        $this->assertEquals('删除', $deletable->title);
        $this->assertEquals('', $deletable->isShowColumn);
        $this->assertFalse($deletable->inverse);
    }

    public function testCustomValues(): void
    {
        $deletable = new Deletable(
            softDelete: true,
            deleteColumn: 'is_deleted',
            title: '移除',
            isShowColumn: 'can_delete',
            inverse: true
        );

        $this->assertTrue($deletable->softDelete);
        $this->assertEquals('is_deleted', $deletable->deleteColumn);
        $this->assertEquals('移除', $deletable->title);
        $this->assertEquals('can_delete', $deletable->isShowColumn);
        $this->assertTrue($deletable->inverse);
    }
}
