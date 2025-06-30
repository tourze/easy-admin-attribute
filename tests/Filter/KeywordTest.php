<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Filter\Keyword;

/**
 * Keyword 属性测试
 */
class KeywordTest extends TestCase
{
    /**
     * 测试默认构造参数
     */
    public function testDefaultConstructor(): void
    {
        $keyword = new Keyword();
        
        $this->assertEquals(0, $keyword->inputWidth);
        $this->assertNull($keyword->name);
        $this->assertNull($keyword->label);
    }

    /**
     * 测试自定义构造参数
     */
    public function testCustomConstructor(): void
    {
        $keyword = new Keyword(
            inputWidth: 250,
            name: 'search_name',
            label: '搜索名称'
        );
        
        $this->assertEquals(250, $keyword->inputWidth);
        $this->assertEquals('search_name', $keyword->name);
        $this->assertEquals('搜索名称', $keyword->label);
    }

    /**
     * 测试 Keyword 属性在属性上的使用（可重复）
     */
    public function testKeywordAttributeOnProperty(): void
    {
        // 使用匿名类测试可重复属性
        $testClass = new class {
            #[Keyword(inputWidth: 200, label: '名称搜索')]
            #[Keyword(inputWidth: 180, label: '标题搜索')]
            public string $searchableField = '';
        };
        
        $reflection = new \ReflectionClass($testClass);
        $property = $reflection->getProperty('searchableField');
        $attributes = $property->getAttributes(Keyword::class);
        
        // 由于 IS_REPEATABLE，这里应该有2个属性
        $this->assertCount(2, $attributes);
        
        $keyword1 = $attributes[0]->newInstance();
        $keyword2 = $attributes[1]->newInstance();
        
        $this->assertInstanceOf(Keyword::class, $keyword1);
        $this->assertInstanceOf(Keyword::class, $keyword2);
        
        $this->assertEquals('名称搜索', $keyword1->label);
        $this->assertEquals('标题搜索', $keyword2->label);
    }

    /**
     * 测试 Keyword 属性的可重复性
     */
    public function testRepeatableKeywordAttribute(): void
    {
        // 使用匿名类测试多重复属性
        $testClass = new class {
            #[Keyword(label: '搜索1')]
            #[Keyword(label: '搜索2')]
            #[Keyword(label: '搜索3')]
            public string $multiSearchField = '';
        };
        
        $reflection = new \ReflectionClass($testClass);
        $property = $reflection->getProperty('multiSearchField');
        $attributes = $property->getAttributes(Keyword::class);
        
        $this->assertCount(3, $attributes);
        
        $keywords = array_map(fn($attr) => $attr->newInstance(), $attributes);
        
        $this->assertEquals('搜索1', $keywords[0]->label);
        $this->assertEquals('搜索2', $keywords[1]->label);
        $this->assertEquals('搜索3', $keywords[2]->label);
    }
} 