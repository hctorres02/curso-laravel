<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:120'],
            'email' => ['required', 'email', Rule::unique(User::class)],
            'password' => ['required', 'confirmed'],
        ];
    }
}
