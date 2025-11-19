<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
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

    protected function failedValidation(Validator $validator)
    {
        $exception = $validator->getException();

        throw new $exception($validator)
            ->errorBag($this->errorBag)
            ->redirectTo(route($this->redirectRoute));
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

    public function validated($key = null, $default = null)
    {
        $data = data_get($this->validator->validated(), $key, $default);

        return collect($data)->filter(fn ($value) => $value !== '' || $value !== null);
    }
}
