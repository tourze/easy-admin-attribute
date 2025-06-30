<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\OnRowFormat;

/**
 * OnRowFormat 事件属性测试
 */
class OnRowFormatTest extends TestCase
{
    /**
     * 测试 OnRowFormat 属性实例化
     */
    public function testOnRowFormatInstantiation(): void
    {
        $onRowFormat = new OnRowFormat();
        
        $this->assertInstanceOf(OnRowFormat::class, $onRowFormat);
    }

    /**
     * 测试 OnRowFormat 属性在方法上的使用
     */
    public function testOnRowFormatAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[OnRowFormat]
            public function handleRowFormat(): void
            {
                // 行格式化处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleRowFormat');
        $attributes = $method->getAttributes(OnRowFormat::class);
        
        $this->assertCount(1, $attributes);
        
        $onRowFormat = $attributes[0]->newInstance();
        $this->assertInstanceOf(OnRowFormat::class, $onRowFormat);
    }

    /**
     * 测试 OnRowFormat 属性目标为方法
     */
    public function testOnRowFormatAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(OnRowFormat::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 