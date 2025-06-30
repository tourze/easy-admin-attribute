<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\BeforeEdit;

/**
 * BeforeEdit 事件属性测试
 */
class BeforeEditTest extends TestCase
{
    /**
     * 测试 BeforeEdit 属性实例化
     */
    public function testBeforeEditInstantiation(): void
    {
        $beforeEdit = new BeforeEdit();
        
        $this->assertInstanceOf(BeforeEdit::class, $beforeEdit);
    }

    /**
     * 测试 BeforeEdit 属性在方法上的使用
     */
    public function testBeforeEditAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[BeforeEdit]
            public function handleBeforeEdit(): void
            {
                // 编辑前的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleBeforeEdit');
        $attributes = $method->getAttributes(BeforeEdit::class);
        
        $this->assertCount(1, $attributes);
        
        $beforeEdit = $attributes[0]->newInstance();
        $this->assertInstanceOf(BeforeEdit::class, $beforeEdit);
    }

    /**
     * 测试 BeforeEdit 属性目标为方法
     */
    public function testBeforeEditAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(BeforeEdit::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 