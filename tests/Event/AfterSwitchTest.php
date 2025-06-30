<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\AfterSwitch;

/**
 * AfterSwitch 事件属性测试
 */
class AfterSwitchTest extends TestCase
{
    /**
     * 测试 AfterSwitch 属性实例化
     */
    public function testAfterSwitchInstantiation(): void
    {
        $afterSwitch = new AfterSwitch();
        
        $this->assertInstanceOf(AfterSwitch::class, $afterSwitch);
    }

    /**
     * 测试 AfterSwitch 属性在方法上的使用
     */
    public function testAfterSwitchAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[AfterSwitch]
            public function handleAfterSwitch(): void
            {
                // 开关状态切换后的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleAfterSwitch');
        $attributes = $method->getAttributes(AfterSwitch::class);
        
        $this->assertCount(1, $attributes);
        
        $afterSwitch = $attributes[0]->newInstance();
        $this->assertInstanceOf(AfterSwitch::class, $afterSwitch);
    }

    /**
     * 测试 AfterSwitch 属性目标为方法
     */
    public function testAfterSwitchAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(AfterSwitch::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 