<?php

namespace App\Http\Requests\Admin\User;

use App\Enums\UserRole;
use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    protected $redirectRoute = 'admin.users.index';

    protected string $defaultOrderBy = 'name';

    protected string $defaultSort = 'asc';

    protected array $sortableColumns = [
        'created_at',
        'email',
        'name',
    ];

    public function rules(): array
    {
        return $this->defaultRules([
            'role' => ['nullable', Rule::enum(UserRole::class)],
        ]);
    }
}
