<?php

namespace Tourze\EasyAdmin\Attribute\Tests\Event;

use PHPUnit\Framework\TestCase;
use Tourze\EasyAdmin\Attribute\Event\AfterCreate;
use Tourze\EasyAdmin\Attribute\Event\AfterEdit;
use Tourze\EasyAdmin\Attribute\Event\AfterSwitch;
use Tourze\EasyAdmin\Attribute\Event\BeforeCreate;
use Tourze\EasyAdmin\Attribute\Event\BeforeEdit;

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
}
