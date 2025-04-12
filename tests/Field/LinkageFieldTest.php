<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\LinkageField;

class LinkageFieldTest extends TestCase
{
    public function testClassExists(): void
    {
        $linkageField = new LinkageField();

        // 由于LinkageField类没有任何属性或方法，只测试类的实例化
        $this->assertInstanceOf(LinkageField::class, $linkageField);
    }

    public function testClassIsAttribute(): void
    {
        // 测试LinkageField是一个有效的PHP 8 Attribute
        $reflectionClass = new \ReflectionClass(LinkageField::class);
        $attributes = $reflectionClass->getAttributes();

        $this->assertNotEmpty($attributes);
        $this->assertEquals(\Attribute::class, $attributes[0]->getName());
    }
}
