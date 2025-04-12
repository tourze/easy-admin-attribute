<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\RichTextField;

class RichTextFieldTest extends TestCase
{
    public function testClassExists(): void
    {
        $richTextField = new RichTextField();

        // 由于RichTextField类没有任何属性或方法，只测试类的实例化
        $this->assertInstanceOf(RichTextField::class, $richTextField);
    }

    public function testClassIsAttribute(): void
    {
        // 测试RichTextField是一个有效的PHP 8 Attribute
        $reflectionClass = new \ReflectionClass(RichTextField::class);
        $attributes = $reflectionClass->getAttributes();

        $this->assertNotEmpty($attributes);
        $this->assertEquals(\Attribute::class, $attributes[0]->getName());
    }
}
