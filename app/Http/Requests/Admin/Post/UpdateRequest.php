<?php

namespace App\Http\Requests\Admin\Post;

use App\Models\Post;
use App\Rules\UniqueSlug;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'slug' => [new UniqueSlug(Post::class)->ignoreModel($this->post)],
        ]);
    }
}
