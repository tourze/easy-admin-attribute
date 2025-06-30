<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\AfterCreate;

/**
 * AfterCreate 事件属性测试
 */
class AfterCreateTest extends TestCase
{
    /**
     * 测试 AfterCreate 属性实例化
     */
    public function testAfterCreateInstantiation(): void
    {
        $afterCreate = new AfterCreate();
        
        $this->assertInstanceOf(AfterCreate::class, $afterCreate);
    }

    /**
     * 测试 AfterCreate 属性在方法上的使用
     */
    public function testAfterCreateAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[AfterCreate]
            public function handleAfterCreate(): void
            {
                // 创建成功后的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleAfterCreate');
        $attributes = $method->getAttributes(AfterCreate::class);
        
        $this->assertCount(1, $attributes);
        
        $afterCreate = $attributes[0]->newInstance();
        $this->assertInstanceOf(AfterCreate::class, $afterCreate);
    }

    /**
     * 测试 AfterCreate 属性目标为方法
     */
    public function testAfterCreateAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(AfterCreate::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 