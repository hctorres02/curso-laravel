<?php

namespace App\Http\Requests\Comment;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_slug' => ['required', Rule::exists(Post::class, 'slug')->where('status', PostStatus::Published)],
            'body' => ['required', 'max:300'],
        ];
    }
}
