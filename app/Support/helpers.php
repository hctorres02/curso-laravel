<?php

use App\Support\Markdown\EmbedExtension;
use App\Support\Markdown\ImageExtension;
use App\Support\Markdown\TableExtension;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

if (! function_exists('decodeMarkdown')) {
    function decodeMarkdown(string $encoded, array $options = []): string
    {
        return Str::markdown($encoded, $options, [
            new EmbedExtension,
            new ImageExtension,
            new TableExtension,
        ]);
    }
}

if (! function_exists('parseDate')) {
    function parseDate(string $value): Carbon
    {
        return Carbon::parse($value, config('app.local_timezone'))->locale(config('app.locale'));
    }
}

if (! function_exists('resolveCurrentValue')) {
    function resolveCurrentValue($name, $current, $default = null): mixed
    {
        if ($current instanceof Model) {
            $current = $current->$name;
        }

        $resolved = $current ?: $default;

        return match (true) {
            $resolved instanceof BackedEnum => $resolved->value,
            $resolved instanceof Collection => $resolved->get($name),
            is_array($resolved) && array_key_exists($name, $resolved) => $resolved[$name],
            default => $resolved,
        };
    }
}
