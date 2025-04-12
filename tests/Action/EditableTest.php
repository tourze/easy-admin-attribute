<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Editable;

class EditableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $editable = new Editable();

        // 根据Editable.php中的默认值测试
        $this->assertEquals(640, $editable->drawerWidth);
        $this->assertEquals('编辑', $editable->title);
        $this->assertEquals('diy-drawer', $editable->actionType);
        $this->assertEquals('', $editable->route);
        $this->assertEquals('', $editable->isShowColumn);
    }

    public function testCustomValues(): void
    {
        $editable = new Editable(
            drawerWidth: 800,
            title: '修改信息',
            actionType: 'modalForm',
            route: '/users/edit',
            isShowColumn: 'can_edit'
        );

        $this->assertEquals(800, $editable->drawerWidth);
        $this->assertEquals('修改信息', $editable->title);
        $this->assertEquals('modalForm', $editable->actionType);
        $this->assertEquals('/users/edit', $editable->route);
        $this->assertEquals('can_edit', $editable->isShowColumn);
    }

    public function testDrawerWidthAsString(): void
    {
        $editable = new Editable(
            drawerWidth: '50%',
            title: '编辑'
        );

        $this->assertEquals('50%', $editable->drawerWidth);
        $this->assertEquals('编辑', $editable->title);
    }
}
