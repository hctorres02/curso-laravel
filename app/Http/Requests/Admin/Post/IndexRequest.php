<?php

namespace App\Http\Requests\Admin\Post;

use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    protected string $defaultOrderBy = 'title';

    protected string $defaultSort = 'asc';

    protected array $sortableColumns = [
        'created_at',
        'status',
        'title',
    ];
}
