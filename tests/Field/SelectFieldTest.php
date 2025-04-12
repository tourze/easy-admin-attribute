<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\SelectField;

class SelectFieldTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $selectField = new SelectField();

        // 根据SelectField.php中的默认值测试
        $this->assertEquals('', $selectField->targetEntity);
        $this->assertEquals('', $selectField->mode);
        $this->assertEquals('id', $selectField->idColumn);
        $this->assertEquals('id', $selectField->orderColumn);
    }

    public function testCustomValues(): void
    {
        $selectField = new SelectField(
            targetEntity: 'App\\Entity\\User',
            mode: 'multiple',
            idColumn: 'user_id',
            orderColumn: 'name'
        );

        $this->assertEquals('App\\Entity\\User', $selectField->targetEntity);
        $this->assertEquals('multiple', $selectField->mode);
        $this->assertEquals('user_id', $selectField->idColumn);
        $this->assertEquals('name', $selectField->orderColumn);
    }
}
