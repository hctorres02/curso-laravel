<?php

use App\Support\Markdown\EmbedExtension;
use App\Support\Markdown\ImageExtension;
use App\Support\Markdown\TableExtension;
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
