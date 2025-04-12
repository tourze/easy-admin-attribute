<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\ImportField;

class ImportFieldTest extends TestCase
{
    public function testClassExists(): void
    {
        $importField = new ImportField();

        // 由于ImportField类没有任何属性或方法，只测试类的实例化
        $this->assertInstanceOf(ImportField::class, $importField);
    }

    public function testClassIsAttribute(): void
    {
        // 测试ImportField是一个有效的PHP 8 Attribute
        $reflectionClass = new \ReflectionClass(ImportField::class);
        $attributes = $reflectionClass->getAttributes();

        $this->assertNotEmpty($attributes);
        $this->assertEquals(\Attribute::class, $attributes[0]->getName());
    }
}
