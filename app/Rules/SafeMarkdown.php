<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class SafeMarkdown implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $options = [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ];

        if (Str::markdown($value) !== Str::markdown($value, $options)) {
            $fail('The :attribute must be a safe markdown.');
        }
    }
}
