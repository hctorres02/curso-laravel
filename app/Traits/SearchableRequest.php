<?php

namespace App\Traits;

use Illuminate\Validation\Rule;

trait SearchableRequest
{
    protected string $defaultOrderBy = 'created_at';

    protected string $defaultSort = 'desc';

    protected array $sortableColumns = ['created_at'];

    public function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'orderBy' => $this->defaultOrderBy,
            'sort' => $this->defaultSort,
        ]);
    }

    public function rules(): array
    {
        return [
            'orderBy' => ['required', Rule::in($this->sortableColumns)],
            'sort' => ['required', Rule::in(['asc', 'desc'])],
        ];
    }
}
