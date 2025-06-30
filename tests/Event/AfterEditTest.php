<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\AfterEdit;

/**
 * AfterEdit 事件属性测试
 */
class AfterEditTest extends TestCase
{
    /**
     * 测试 AfterEdit 属性实例化
     */
    public function testAfterEditInstantiation(): void
    {
        $afterEdit = new AfterEdit();
        
        $this->assertInstanceOf(AfterEdit::class, $afterEdit);
    }

    /**
     * 测试 AfterEdit 属性在方法上的使用
     */
    public function testAfterEditAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[AfterEdit]
            public function handleAfterEdit(): void
            {
                // 编辑成功后的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleAfterEdit');
        $attributes = $method->getAttributes(AfterEdit::class);
        
        $this->assertCount(1, $attributes);
        
        $afterEdit = $attributes[0]->newInstance();
        $this->assertInstanceOf(AfterEdit::class, $afterEdit);
    }

    /**
     * 测试 AfterEdit 属性目标为方法
     */
    public function testAfterEditAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(AfterEdit::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 