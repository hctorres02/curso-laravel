<?php

namespace App\Http\Requests\Admin\Post;

use App\Models\Post;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'slug' => ['required', 'max:255', Rule::unique(Post::class)->ignoreModel($this->post)],
        ]);
    }
}
