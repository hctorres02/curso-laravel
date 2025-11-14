<?php

namespace App\Enums;

use App\Traits\EnumSupport;

enum PostStatus: string
{
    use EnumSupport;

    case Draft = 'draft';
    case Published = 'published';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Published => 'Published',
        };
    }
}
