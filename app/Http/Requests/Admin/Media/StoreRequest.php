<?php

namespace App\Http\Requests\Admin\Media;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'attachments' => ['required', 'array'],
            'attachments.*' => ['file', 'max:4096'],
        ];
    }
}
