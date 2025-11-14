<?php

namespace App\Enums;

use App\Traits\EnumSupport;

enum MediaDirectory: string
{
    use EnumSupport;

    case Attachments = 'attachments';

    case Avatars = 'avatars';

    case Covers = 'covers';

    public function label(): string
    {
        return match ($this) {
            self::Attachments => 'Attachments',
            self::Avatars => 'Avatars',
            self::Covers => 'Covers',
        };
    }
}
