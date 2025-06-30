<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\TreeView;

/**
 * TreeView 属性测试
 */
class TreeViewTest extends TestCase
{
    /**
     * 测试默认构造参数
     */
    public function testDefaultConstructor(): void
    {
        $treeView = new TreeView();
        
        $this->assertEquals(300, $treeView->width);
        $this->assertNull($treeView->dataModel);
        $this->assertNull($treeView->sourceAttribute);
        $this->assertEquals('parent', $treeView->targetAttribute);
        $this->assertTrue($treeView->showNoChildrenNode);
        $this->assertEquals('api_tree', $treeView->group);
    }

    /**
     * 测试自定义构造参数
     */
    public function testCustomConstructor(): void
    {
        $treeView = new TreeView(
            width: 500,
            dataModel: 'SomeModel',
            sourceAttribute: 'source_field',
            targetAttribute: 'parent_id',
            showNoChildrenNode: false,
            group: 'custom_tree'
        );
        
        $this->assertEquals(500, $treeView->width);
        $this->assertEquals('SomeModel', $treeView->dataModel);
        $this->assertEquals('source_field', $treeView->sourceAttribute);
        $this->assertEquals('parent_id', $treeView->targetAttribute);
        $this->assertFalse($treeView->showNoChildrenNode);
        $this->assertEquals('custom_tree', $treeView->group);
    }

    /**
     * 测试 TreeView 属性在类上的使用
     */
    public function testTreeViewAttribute(): void
    {
        // 使用匿名类测试属性
        $testClass = new #[TreeView(width: 400, dataModel: 'TestModel')] class {};
        
        $reflection = new \ReflectionClass($testClass);
        $attributes = $reflection->getAttributes(TreeView::class);
        
        $this->assertCount(1, $attributes);
        
        $treeView = $attributes[0]->newInstance();
        $this->assertInstanceOf(TreeView::class, $treeView);
        $this->assertEquals(400, $treeView->width);
        $this->assertEquals('TestModel', $treeView->dataModel);
    }
} 