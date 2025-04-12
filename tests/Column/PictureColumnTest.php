<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Column;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Column\PictureColumn;

class PictureColumnTest extends TestCase
{
    public function testClassExists(): void
    {
        $pictureColumn = new PictureColumn();

        // 由于PictureColumn类没有任何属性或方法，只测试类的实例化
        $this->assertInstanceOf(PictureColumn::class, $pictureColumn);
    }

    public function testClassIsAttribute(): void
    {
        // 测试PictureColumn是一个有效的PHP 8 Attribute
        $reflectionClass = new \ReflectionClass(PictureColumn::class);
        $attributes = $reflectionClass->getAttributes();

        $this->assertNotEmpty($attributes);
        $this->assertEquals(\Attribute::class, $attributes[0]->getName());
    }
}
