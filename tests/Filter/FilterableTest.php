<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Filter\Filterable;

/**
 * Filterable 属性测试
 */
class FilterableTest extends TestCase
{
    /**
     * 测试默认构造参数
     */
    public function testDefaultConstructor(): void
    {
        $filterable = new Filterable();
        
        $this->assertEquals('', $filterable->label);
        $this->assertEquals(0, $filterable->inputWidth);
        $this->assertEquals('', $filterable->placeholder);
        $this->assertEquals('', $filterable->dataModel);
        $this->assertEquals([], $filterable->dataParams);
        $this->assertEquals([], $filterable->dataOrder);
        $this->assertEquals('', $filterable->filterQueryMethod);
        $this->assertEquals('input', $filterable->fieldType);
        $this->assertNull($filterable->enumList);
        $this->assertEquals('', $filterable->columnName);
        $this->assertTrue($filterable->like);
        $this->assertNull($filterable->order);
    }

    /**
     * 测试自定义构造参数
     */
    public function testCustomConstructor(): void
    {
        $filterable = new Filterable(
            label: '名称过滤',
            inputWidth: 200,
            placeholder: '请输入名称',
            dataModel: 'UserModel',
            dataParams: ['status' => 'active'],
            dataOrder: ['name' => 'asc'],
            filterQueryMethod: 'customFilter',
            fieldType: 'select',
            enumList: ['1' => '启用', '0' => '禁用'],
            columnName: 'user_name',
            like: false,
            order: 10
        );
        
        $this->assertEquals('名称过滤', $filterable->label);
        $this->assertEquals(200, $filterable->inputWidth);
        $this->assertEquals('请输入名称', $filterable->placeholder);
        $this->assertEquals('UserModel', $filterable->dataModel);
        $this->assertEquals(['status' => 'active'], $filterable->dataParams);
        $this->assertEquals(['name' => 'asc'], $filterable->dataOrder);
        $this->assertEquals('customFilter', $filterable->filterQueryMethod);
        $this->assertEquals('select', $filterable->fieldType);
        $this->assertEquals(['1' => '启用', '0' => '禁用'], $filterable->enumList);
        $this->assertEquals('user_name', $filterable->columnName);
        $this->assertFalse($filterable->like);
        $this->assertEquals(10, $filterable->order);
    }

    /**
     * 测试 Filterable 属性在属性上的使用
     */
    public function testFilterableAttributeOnProperty(): void
    {
        // 使用匿名类测试属性上的注解
        $testClass = new class {
            #[Filterable(label: '名称', fieldType: 'input')]
            public string $name = '';
        };
        
        $reflection = new \ReflectionClass($testClass);
        $property = $reflection->getProperty('name');
        $attributes = $property->getAttributes(Filterable::class);
        
        $this->assertCount(1, $attributes);
        
        $filterable = $attributes[0]->newInstance();
        $this->assertInstanceOf(Filterable::class, $filterable);
        $this->assertEquals('名称', $filterable->label);
        $this->assertEquals('input', $filterable->fieldType);
    }

    /**
     * 测试 Filterable 属性在方法上的使用
     */
    public function testFilterableAttributeOnMethod(): void
    {
        // 使用匿名类测试方法上的注解
        $testClass = new class {
            #[Filterable(fieldType: 'select', enumList: ['1' => '是', '0' => '否'])]
            public function getFilteredData(): array
            {
                return [];
            }
        };
        
        $reflection = new \ReflectionClass($testClass);
        $method = $reflection->getMethod('getFilteredData');
        $attributes = $method->getAttributes(Filterable::class);
        
        $this->assertCount(1, $attributes);
        
        $filterable = $attributes[0]->newInstance();
        $this->assertInstanceOf(Filterable::class, $filterable);
        $this->assertEquals('select', $filterable->fieldType);
    }
} 