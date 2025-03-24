<?php

namespace Tourze\EasyAdmin\Attribute\Column;

use ChrisUllyott\FileSize;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
class FileSizeColumn
{
    public static function format(mixed $value): string
    {
        return (new FileSize($value))->asAuto();
    }
}
