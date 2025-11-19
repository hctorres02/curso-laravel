<?php

namespace App\Traits;

use Illuminate\Validation\Rule;

trait SearchableRequest
{
    public function defaultRules(array $extraRules = []): array
    {
        return array_merge([
            'orderBy' => ['required', Rule::in($this->sortableColumns ?? ['created_at'])],
            'sort' => ['required', Rule::in(['asc', 'desc'])],
            'search' => ['nullable'],
        ], $extraRules);
    }

    public function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'orderBy' => $this->defaultOrderBy ?? 'created_at',
            'sort' => $this->defaultSort ?? 'desc',
            'search' => null,
        ]);
    }

    public function rules(): array
    {
        return $this->defaultRules();
    }
}
