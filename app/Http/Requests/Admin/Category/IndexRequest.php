<?php

namespace App\Http\Requests\Admin\Category;

use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    protected string $defaultOrderBy = 'name';

    protected string $defaultSort = 'asc';

    protected array $sortableColumns = [
        'created_at',
        'name',
    ];
}
