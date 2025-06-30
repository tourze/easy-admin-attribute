<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Tests\SampleEntity;

/**
 * SampleEntity 测试类
 */
class SampleEntityTest extends TestCase
{
    /**
     * 测试 SampleEntity 构造函数
     */
    public function testSampleEntityConstruction(): void
    {
        $entity = new SampleEntity('测试名称', 99.99, '测试描述', '搜索字段');
        
        $this->assertEquals('测试名称', $entity->getName());
        $this->assertEquals(99.99, $entity->getPrice());
        $this->assertEquals('测试描述', $entity->getDescription());
        $this->assertEquals('搜索字段', $entity->getSearchField());
    }

    /**
     * 测试 SampleEntity 默认构造函数
     */
    public function testSampleEntityDefaultConstruction(): void
    {
        $entity = new SampleEntity();
        
        $this->assertEquals('', $entity->getName());
        $this->assertEquals(0.0, $entity->getPrice());
        $this->assertEquals('', $entity->getDescription());
        $this->assertEquals('', $entity->getSearchField());
    }

    /**
     * 测试 SampleEntity 类上的属性
     */
    public function testSampleEntityClassAttributes(): void
    {
        $reflection = new \ReflectionClass(SampleEntity::class);
        $attributes = $reflection->getAttributes();
        
        // 应该有4个类级别的属性
        $this->assertCount(4, $attributes);
        
        $attributeNames = array_map(fn($attr) => $attr->getName(), $attributes);
        $this->assertContains('Tourze\EasyAdmin\Attribute\Action\Listable', $attributeNames);
        $this->assertContains('Tourze\EasyAdmin\Attribute\Action\Deletable', $attributeNames);
        $this->assertContains('Tourze\EasyAdmin\Attribute\Action\Exportable', $attributeNames);
        $this->assertContains('Tourze\EasyAdmin\Attribute\Permission\AsPermission', $attributeNames);
    }

    /**
     * 测试 SampleEntity 属性上的注解
     */
    public function testSampleEntityPropertyAttributes(): void
    {
        $reflection = new \ReflectionClass(SampleEntity::class);
        
        // 测试 name 属性
        $nameProperty = $reflection->getProperty('name');
        $nameAttributes = $nameProperty->getAttributes();
        $this->assertCount(2, $nameAttributes);
        
        // 测试 price 属性
        $priceProperty = $reflection->getProperty('price');
        $priceAttributes = $priceProperty->getAttributes();
        $this->assertCount(2, $priceAttributes);
        
        // 测试 description 属性
        $descProperty = $reflection->getProperty('description');
        $descAttributes = $descProperty->getAttributes();
        $this->assertCount(1, $descAttributes);
        
        // 测试 searchField 属性
        $searchProperty = $reflection->getProperty('searchField');
        $searchAttributes = $searchProperty->getAttributes();
        $this->assertCount(0, $searchAttributes);
    }

    /**
     * 测试 getter 方法
     */
    public function testGetterMethods(): void
    {
        $entity = new SampleEntity('产品名', 199.99, '产品描述', '搜索关键词');
        
        $this->assertEquals('产品名', $entity->getName());
        $this->assertEquals(199.99, $entity->getPrice());
        $this->assertEquals('产品描述', $entity->getDescription());
        $this->assertEquals('搜索关键词', $entity->getSearchField());
    }
} 