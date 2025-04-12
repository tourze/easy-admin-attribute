<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Listable;

class ListableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $listable = new Listable();

        $this->assertTrue($listable->showPagination);
        $this->assertEquals(0, $listable->actionWidth);
        $this->assertEquals(Listable::MAX_CONTENT, $listable->scrollX);
        $this->assertFalse($listable->showTotal);
        $this->assertEquals('id', $listable->totalTitleColumn);
        $this->assertEquals(['id' => 'DESC'], $listable->sortColumn);
    }

    public function testCustomValues(): void
    {
        $listable = new Listable(
            showPagination: false,
            actionWidth: 150,
            scrollX: 1200,
            showTotal: true,
            totalTitleColumn: 'name',
            sortColumn: ['created_at' => 'ASC']
        );

        $this->assertFalse($listable->showPagination);
        $this->assertEquals(150, $listable->actionWidth);
        $this->assertEquals(1200, $listable->scrollX);
        $this->assertTrue($listable->showTotal);
        $this->assertEquals('name', $listable->totalTitleColumn);
        $this->assertEquals(['created_at' => 'ASC'], $listable->sortColumn);
    }
}
