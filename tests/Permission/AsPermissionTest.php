<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Permission;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Permission\AsPermission;

class AsPermissionTest extends TestCase
{
    protected function setUp(): void
    {
        // 确保环境变量在每个测试前设置
        $_ENV['TEST_PERMISSION_TITLE'] = '测试权限标题';
    }

    public function testDefaultValues(): void
    {
        $permission = new AsPermission();

        $this->assertEquals('', $permission->name);
        $this->assertEquals('', $permission->title);
        $this->assertEquals('', $permission->titleOverrideEnv);
        $this->assertEquals([], $permission->children);
        $this->assertEquals([], $permission->includes);
    }

    public function testCustomValues(): void
    {
        $permission = new AsPermission(
            name: 'user_management',
            title: '用户管理',
            titleOverrideEnv: '',
            children: ['view', 'edit', 'delete'],
            includes: ['user_logs']
        );

        $this->assertEquals('user_management', $permission->name);
        $this->assertEquals('用户管理', $permission->title);
        $this->assertEquals('', $permission->titleOverrideEnv);
        $this->assertEquals(['view', 'edit', 'delete'], $permission->children);
        $this->assertEquals(['user_logs'], $permission->includes);
    }

    public function testTitleOverrideFromEnv(): void
    {
        // 直接在此测试方法中设置环境变量，确保它被正确应用
        $_ENV['TEST_PERMISSION_TITLE'] = '测试权限标题';

        $permission = new AsPermission(
            name: 'test_permission',
            title: '原始标题',
            titleOverrideEnv: 'TEST_PERMISSION_TITLE'
        );

        // 环境变量应该覆盖标题
        $this->assertEquals('测试权限标题', $permission->title);
    }
}
