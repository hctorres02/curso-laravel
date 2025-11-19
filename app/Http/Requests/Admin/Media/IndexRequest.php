<?php

namespace App\Http\Requests\Admin\Media;

use App\Enums\MediaDirectory;
use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    protected string $defaultOrderBy = 'name';

    protected string $defaultSort = 'asc';

    protected array $sortableColumns = [
        'created_at',
        'name',
        'path',
    ];

    public function rules(): array
    {
        return $this->defaultRules([
            'directory' => ['nullable', Rule::enum(MediaDirectory::class)],
        ]);
    }
}
