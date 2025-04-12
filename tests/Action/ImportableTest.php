<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Action;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Action\Importable;

class ImportableTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $importable = new Importable();

        // 根据Importable.php中的默认值测试
        $this->assertTrue($importable->generateTemplate);
        $this->assertEquals('导入', $importable->title);
        $this->assertNull($importable->featureKey);
    }

    public function testCustomValues(): void
    {
        $importable = new Importable(
            generateTemplate: false,
            title: '批量导入',
            featureKey: 'import_users'
        );

        $this->assertFalse($importable->generateTemplate);
        $this->assertEquals('批量导入', $importable->title);
        $this->assertEquals('import_users', $importable->featureKey);
    }
}
