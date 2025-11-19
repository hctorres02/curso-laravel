<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use App\Rules\UniqueSlug;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'slug' => [new UniqueSlug(Category::class)->ignoreModel($this->category)],
        ]);
    }
}
