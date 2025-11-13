<?php

namespace App\Http\Requests\Admin\Comment;

use App\Enums\CommentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::enum(CommentStatus::class)],
        ];
    }
}
