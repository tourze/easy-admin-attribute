<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Field;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Field\FormField;

class FormFieldTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $formField = new FormField();

        $this->assertEquals('', $formField->id);
        $this->assertEquals('', $formField->title);
        $this->assertEquals(24, $formField->span);
        $this->assertNull($formField->order);
        $this->assertFalse($formField->required);
        $this->assertNull($formField->defaultValue);
        $this->assertTrue($formField->canEdit);
        $this->assertNull($formField->prefixDivider);
        $this->assertFalse($formField->allowRemote);
        $this->assertNull($formField->remoteLimit);
        $this->assertNull($formField->showExpression);
        $this->assertNull($formField->optionWhere);
    }

    public function testCustomValues(): void
    {
        $formField = new FormField(
            id: 'custom_id',
            title: '自定义标题',
            span: 12,
            order: 1,
            required: true,
            defaultValue: 'default',
            canEdit: false,
            prefixDivider: 'divider',
            allowRemote: true,
            remoteLimit: 100,
            showExpression: 'field == 1',
            optionWhere: 'status = 1'
        );

        $this->assertEquals('custom_id', $formField->id);
        $this->assertEquals('自定义标题', $formField->title);
        $this->assertEquals(12, $formField->span);
        $this->assertEquals(1, $formField->order);
        $this->assertTrue($formField->required);
        $this->assertEquals('default', $formField->defaultValue);
        $this->assertFalse($formField->canEdit);
        $this->assertEquals('divider', $formField->prefixDivider);
        $this->assertTrue($formField->allowRemote);
        $this->assertEquals(100, $formField->remoteLimit);
        $this->assertEquals('field == 1', $formField->showExpression);
        $this->assertEquals('status = 1', $formField->optionWhere);
    }
}
