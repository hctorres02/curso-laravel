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
            'post_id' => ['required', Rule::exists(Post::class, 'id')->where('status', PostStatus::Published)],
            'body' => ['required', 'max:300'],
        ];
    }
}
