<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UniqueSlug implements ValidationRule
{
    protected ?int $ignoreId = null;

    protected ?string $ignoreColumn = null;

    public function __construct(protected string $table) {}

    public function ignoreModel($model, ?string $idColumn = 'id'): self
    {
        $this->ignoreId = $model?->getKey();
        $this->ignoreColumn = $idColumn;

        return $this;
    }

    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $rule = Rule::unique($this->table, 'slug');

        if ($this->ignoreId) {
            $rule->ignore($this->ignoreId, $this->ignoreColumn);
        }

        $validator = validator([$attribute => $value], [
            $attribute => ['required', 'max:255', $rule],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $fail($message);
            }
        }
    }
}
