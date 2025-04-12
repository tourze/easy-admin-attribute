<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\CurdAction;

class CurdActionTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $curdAction = new CurdAction();

        // 根据CurdAction.php中的默认值测试
        $this->assertEquals('', $curdAction->label);
        $this->assertEquals('0', $curdAction->drawerWidth);
        $this->assertNull($curdAction->showExpression);
    }

    public function testCustomValues(): void
    {
        $curdAction = new CurdAction(
            label: '用户管理',
            drawerWidth: '800',
            showExpression: 'role === "admin"'
        );

        $this->assertEquals('用户管理', $curdAction->label);
        $this->assertEquals('800', $curdAction->drawerWidth);
        $this->assertEquals('role === "admin"', $curdAction->showExpression);
    }
}
