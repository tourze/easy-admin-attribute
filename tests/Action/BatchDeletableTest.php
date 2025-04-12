<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\BatchDeletable;

class BatchDeletableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $batchDeletable = new BatchDeletable();

        // 根据BatchDeletable.php中的默认值测试
        $this->assertFalse($batchDeletable->softDelete);
        $this->assertEquals('deleted', $batchDeletable->deleteColumn);
        $this->assertEquals('删除', $batchDeletable->title);
        $this->assertEquals('', $batchDeletable->isShowColumn);
        $this->assertFalse($batchDeletable->inverse);
    }

    public function testCustomValues(): void
    {
        $batchDeletable = new BatchDeletable(
            softDelete: true,
            deleteColumn: 'is_deleted',
            title: '批量删除',
            isShowColumn: 'can_batch_delete',
            inverse: true
        );

        $this->assertTrue($batchDeletable->softDelete);
        $this->assertEquals('is_deleted', $batchDeletable->deleteColumn);
        $this->assertEquals('批量删除', $batchDeletable->title);
        $this->assertEquals('can_batch_delete', $batchDeletable->isShowColumn);
        $this->assertTrue($batchDeletable->inverse);
    }
}
