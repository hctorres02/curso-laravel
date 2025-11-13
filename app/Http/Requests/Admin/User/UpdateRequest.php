<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'email' => ['required', 'email', Rule::unique(User::class)->ignoreModel($this->user)],
        ]);
    }
}
