<?php

use App\Support\Markdown\EmbedExtension;
use App\Support\Markdown\ImageExtension;
use App\Support\Markdown\TableExtension;
use Illuminate\Support\Carbon;
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
