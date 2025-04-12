<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Creatable;

class CreatableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $creatable = new Creatable();

        // 根据Creatable.php中的默认值测试
        $this->assertEquals('新建', $creatable->title);
        $this->assertEquals('primary', $creatable->buttonType);
        $this->assertEquals('', $creatable->icon);
        $this->assertEquals(640, $creatable->drawerWidth);
        $this->assertEquals('diy-drawer', $creatable->actionType);
        $this->assertEquals('', $creatable->route);
        $this->assertEquals('', $creatable->isShowColumn);
    }

    public function testCustomValues(): void
    {
        $creatable = new Creatable(
            title: '添加用户',
            buttonType: 'secondary',
            icon: 'plus',
            drawerWidth: 800,
            actionType: 'modalForm',
            route: '/users/create',
            isShowColumn: 'can_create'
        );

        $this->assertEquals('添加用户', $creatable->title);
        $this->assertEquals('secondary', $creatable->buttonType);
        $this->assertEquals('plus', $creatable->icon);
        $this->assertEquals(800, $creatable->drawerWidth);
        $this->assertEquals('modalForm', $creatable->actionType);
        $this->assertEquals('/users/create', $creatable->route);
        $this->assertEquals('can_create', $creatable->isShowColumn);
    }
}
