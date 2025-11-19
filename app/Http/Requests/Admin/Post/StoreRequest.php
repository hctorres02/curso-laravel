<?php

namespace App\Http\Requests\Admin\Post;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Rules\SafeMarkdown;
use App\Rules\UniqueSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'slug' => $this->title,
        ]);

        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'title' => ['required', 'max:255'],
            'slug' => [new UniqueSlug(Post::class)],
            'headline' => ['nullable', 'max:300'],
            'body' => ['required', 'max:8000', new SafeMarkdown],
            'status' => ['required', Rule::enum(PostStatus::class)],
        ];
    }
}
