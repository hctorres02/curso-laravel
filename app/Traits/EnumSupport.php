<?php

namespace App\Traits;

trait EnumSupport
{
    public static function toArray(string $value = 'label'): array
    {
        $cases = [];

        foreach (self::cases() as $case) {
            $cases[$case->value] = method_exists($case, $value) ? $case->$value() : $case->$value;
        }

        return $cases;
    }
}
