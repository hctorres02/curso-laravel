<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use App\Rules\UniqueSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'slug' => $this->title,
        ]);

        $this->merge([
            'slug' => Str::slug($this->slug ?: $this->title),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'slug' => [new UniqueSlug(Category::class)],
            'description' => ['required', 'max:600'],
        ];
    }
}
