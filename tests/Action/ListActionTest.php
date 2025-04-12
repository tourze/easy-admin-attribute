<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\ListAction;

class ListActionTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $listAction = new ListAction();

        // 根据ListAction.php中的默认值测试
        $this->assertNull($listAction->title);
        $this->assertNull($listAction->showExpression);
    }

    public function testCustomValues(): void
    {
        $listAction = new ListAction(
            title: '用户列表',
            showExpression: 'role === "admin"'
        );

        $this->assertEquals('用户列表', $listAction->title);
        $this->assertEquals('role === "admin"', $listAction->showExpression);
    }
}
