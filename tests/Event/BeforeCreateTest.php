<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\BeforeCreate;

/**
 * BeforeCreate 事件属性测试
 */
class BeforeCreateTest extends TestCase
{
    /**
     * 测试 BeforeCreate 属性实例化
     */
    public function testBeforeCreateInstantiation(): void
    {
        $beforeCreate = new BeforeCreate();
        
        $this->assertInstanceOf(BeforeCreate::class, $beforeCreate);
    }

    /**
     * 测试 BeforeCreate 属性在方法上的使用
     */
    public function testBeforeCreateAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[BeforeCreate]
            public function handleBeforeCreate(): void
            {
                // 创建前的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleBeforeCreate');
        $attributes = $method->getAttributes(BeforeCreate::class);
        
        $this->assertCount(1, $attributes);
        
        $beforeCreate = $attributes[0]->newInstance();
        $this->assertInstanceOf(BeforeCreate::class, $beforeCreate);
    }

    /**
     * 测试 BeforeCreate 属性目标为方法
     */
    public function testBeforeCreateAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(BeforeCreate::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 