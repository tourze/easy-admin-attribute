<?php

namespace Tourze\EasyAdmin\Attribute\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Deletable;
use Tourze\EasyAdmin\Attribute\Action\Exportable;
use Tourze\EasyAdmin\Attribute\Action\Listable;
use Tourze\EasyAdmin\Attribute\Permission\AsPermission;

/**
 * 集成测试，测试属性如何在一个完整的实体类中组合使用
 */
class IntegrationTest extends TestCase
{
    /**
     * 测试示例实体类
     */
    public function testSampleEntity(): void
    {
        // 获取示例实体类上的属性
        $classAttributes = $this->getClassAttributes(SampleEntity::class);

        // 验证实体类上的属性
        $this->assertCount(4, $classAttributes);
        $this->assertInstanceOf(Listable::class, $classAttributes[0]);
        $this->assertInstanceOf(Deletable::class, $classAttributes[1]);
        $this->assertInstanceOf(Exportable::class, $classAttributes[2]);
        $this->assertInstanceOf(AsPermission::class, $classAttributes[3]);

        // 验证 Listable 属性的属性值
        $this->assertTrue($classAttributes[0]->showPagination);
        $this->assertTrue($classAttributes[0]->showTotal);

        // 验证 Deletable 属性的属性值
        $this->assertTrue($classAttributes[1]->softDelete);
        $this->assertEquals('deleted_at', $classAttributes[1]->deleteColumn);

        // 验证 Exportable 属性的属性值
        $this->assertEquals('export-excel-by-exceljs', $classAttributes[2]->type);
        $this->assertEquals('导出列表数据', $classAttributes[2]->label);
        $this->assertEquals('sample-data', $classAttributes[2]->fileName);

        // 获取并测试实体属性上的属性
        // 这里我们使用反射来获取属性信息，因为属性可能是私有的
        $reflection = new \ReflectionClass(SampleEntity::class);

        // 测试 name 属性
        $nameProperty = $reflection->getProperty('name');
        $nameAttributes = $nameProperty->getAttributes();
        $this->assertCount(2, $nameAttributes); // ListColumn 和 FormField

        // 测试 price 属性
        $priceProperty = $reflection->getProperty('price');
        $priceAttributes = $priceProperty->getAttributes();
        $this->assertCount(2, $priceAttributes); // ListColumn 和 FormField

        // 测试 description 属性
        $descProperty = $reflection->getProperty('description');
        $descAttributes = $descProperty->getAttributes();
        $this->assertCount(1, $descAttributes); // FormField
    }

    /**
     * 获取类上的所有属性实例
     *
     * @param string $className 类名
     * @return array 属性实例数组
     */
    private function getClassAttributes(string $className): array
    {
        $reflection = new \ReflectionClass($className);
        $attributeInstances = [];

        foreach ($reflection->getAttributes() as $attribute) {
            $attributeInstances[] = $attribute->newInstance();
        }

        return $attributeInstances;
    }
}

/**
 * 用于测试的示例实体类
 */
#[Listable(showPagination: true, showTotal: true)]
#[Deletable(softDelete: true, deleteColumn: 'deleted_at')]
#[Exportable(fileName: 'sample-data')]
#[AsPermission(name: 'sample', title: '示例管理')]
class SampleEntity
{
    private string $name;

    private float $price;

    private string $description;

    private string $searchField;

    // Getters and setters would be here in a real entity
}
