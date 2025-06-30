<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\OnLinkage;

/**
 * OnLinkage 事件属性测试
 */
class OnLinkageTest extends TestCase
{
    /**
     * 测试 OnLinkage 属性实例化
     */
    public function testOnLinkageInstantiation(): void
    {
        $onLinkage = new OnLinkage();
        
        $this->assertInstanceOf(OnLinkage::class, $onLinkage);
    }

    /**
     * 测试 OnLinkage 属性在方法上的使用
     */
    public function testOnLinkageAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[OnLinkage]
            public function handleLinkage(): void
            {
                // 联动处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleLinkage');
        $attributes = $method->getAttributes(OnLinkage::class);
        
        $this->assertCount(1, $attributes);
        
        $onLinkage = $attributes[0]->newInstance();
        $this->assertInstanceOf(OnLinkage::class, $onLinkage);
    }

    /**
     * 测试 OnLinkage 属性目标为方法
     */
    public function testOnLinkageAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(OnLinkage::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 