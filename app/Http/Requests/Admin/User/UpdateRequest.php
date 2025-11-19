<?php

namespace App\Http\Requests\Admin\User;

use App\Enums\UserRole;
use App\Enums\UserPermission;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:120'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignoreModel($this->user)],
            'role' => ['required', Rule::enum(UserRole::class)],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => [Rule::enum(UserPermission::class)],
        ];
    }
}
