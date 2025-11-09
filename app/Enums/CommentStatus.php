<?php

namespace App\Enums;

use App\Traits\EnumSupport;

enum CommentStatus: string
{
    use EnumSupport;

    case Approved = 'approved';
    case Pending = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::Approved => 'Approved',
            self::Pending => 'Pending',
        };
    }
}
