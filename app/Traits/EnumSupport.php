<?php

namespace App\Traits;

trait EnumSupport
{
    public static function toArray(): array
    {
        $cases = [];

        foreach (self::cases() as $case) {
            $cases[$case->value] = $case->label();
        }

        return $cases;
    }
}
