<?php

namespace App\Http\Requests\Admin\Media;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
        ];
    }
}
