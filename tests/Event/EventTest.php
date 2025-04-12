<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\AfterCreate;
use Tourze\EasyAdmin\Attribute\Event\AfterEdit;
use Tourze\EasyAdmin\Attribute\Event\AfterSwitch;
use Tourze\EasyAdmin\Attribute\Event\BeforeCreate;
use Tourze\EasyAdmin\Attribute\Event\BeforeEdit;
use Tourze\EasyAdmin\Attribute\Event\OnFilterQuery;
use Tourze\EasyAdmin\Attribute\Event\OnLinkage;
use Tourze\EasyAdmin\Attribute\Event\OnRowFormat;

class EventTest extends TestCase
{
    public function testAfterCreateExists(): void
    {
        $event = new AfterCreate();
        $this->assertInstanceOf(AfterCreate::class, $event);
    }

    public function testAfterEditExists(): void
    {
        $event = new AfterEdit();
        $this->assertInstanceOf(AfterEdit::class, $event);
    }

    public function testAfterSwitchExists(): void
    {
        $event = new AfterSwitch();
        $this->assertInstanceOf(AfterSwitch::class, $event);
    }

    public function testBeforeCreateExists(): void
    {
        $event = new BeforeCreate();
        $this->assertInstanceOf(BeforeCreate::class, $event);
    }

    public function testBeforeEditExists(): void
    {
        $event = new BeforeEdit();
        $this->assertInstanceOf(BeforeEdit::class, $event);
    }

    public function testOnRowFormatExists(): void
    {
        $event = new OnRowFormat();
        $this->assertInstanceOf(OnRowFormat::class, $event);
    }

    public function testOnLinkageExists(): void
    {
        $event = new OnLinkage();
        $this->assertInstanceOf(OnLinkage::class, $event);
    }

    public function testOnFilterQueryExists(): void
    {
        $event = new OnFilterQuery();
        $this->assertInstanceOf(OnFilterQuery::class, $event);

        // 测试默认值
        $this->assertEquals('', $event->placeholder);
        $this->assertEquals('', $event->inputWidth);
    }

    public function testOnFilterQueryCustomValues(): void
    {
        $event = new OnFilterQuery(
            placeholder: '请输入搜索关键词',
            inputWidth: '300px'
        );

        $this->assertEquals('请输入搜索关键词', $event->placeholder);
        $this->assertEquals('300px', $event->inputWidth);
    }
}
