<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\OnFilterQuery;

/**
 * OnFilterQuery 事件属性测试
 */
class OnFilterQueryTest extends TestCase
{
    /**
     * 测试 OnFilterQuery 属性实例化
     */
    public function testOnFilterQueryInstantiation(): void
    {
        $onFilterQuery = new OnFilterQuery();
        
        $this->assertInstanceOf(OnFilterQuery::class, $onFilterQuery);
    }

    /**
     * 测试 OnFilterQuery 属性在方法上的使用
     */
    public function testOnFilterQueryAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[OnFilterQuery]
            public function handleFilterQuery(): void
            {
                // 过滤查询时的处理逻辑
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('handleFilterQuery');
        $attributes = $method->getAttributes(OnFilterQuery::class);
        
        $this->assertCount(1, $attributes);
        
        $onFilterQuery = $attributes[0]->newInstance();
        $this->assertInstanceOf(OnFilterQuery::class, $onFilterQuery);
    }

    /**
     * 测试 OnFilterQuery 属性目标为方法
     */
    public function testOnFilterQueryAttributeTarget(): void
    {
        $reflection = new \ReflectionClass(OnFilterQuery::class);
        $attributes = $reflection->getAttributes(\Attribute::class);
        
        $this->assertCount(1, $attributes);
        $attribute = $attributes[0]->newInstance();
        $this->assertEquals(\Attribute::TARGET_METHOD, $attribute->flags);
    }
} 