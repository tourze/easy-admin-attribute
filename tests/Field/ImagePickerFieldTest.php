<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\ImagePickerField;

class ImagePickerFieldTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $imagePickerField = new ImagePickerField();

        // 根据ImagePickerField.php中的默认值测试
        $this->assertEquals(1, $imagePickerField->limit);
    }

    public function testCustomValues(): void
    {
        $imagePickerField = new ImagePickerField(
            limit: 5
        );

        $this->assertEquals(5, $imagePickerField->limit);
    }
}
