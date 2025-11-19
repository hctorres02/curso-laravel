<?php

namespace App\Http\Requests\Admin\Comment;

use App\Enums\CommentStatus;
use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    public function rules(): array
    {
        return $this->defaultRules([
            'status' => ['nullable', Rule::enum(CommentStatus::class)],
        ]);
    }
}
