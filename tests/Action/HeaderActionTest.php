<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\HeaderAction;

class HeaderActionTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $headerAction = new HeaderAction();

        // 根据HeaderAction.php中的默认值测试
        $this->assertNull($headerAction->title);
        $this->assertNull($headerAction->featureKey);
    }

    public function testCustomValues(): void
    {
        $headerAction = new HeaderAction(
            title: '用户操作',
            featureKey: 'user_actions'
        );

        $this->assertEquals('用户操作', $headerAction->title);
        $this->assertEquals('user_actions', $headerAction->featureKey);
    }
}
