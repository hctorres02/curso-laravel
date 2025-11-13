<?php

namespace App\Http\Requests\Admin\Media;

use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    use SearchableRequest;

    protected string $defaultOrderBy = 'name';

    protected string $defaultSort = 'asc';

    protected array $sortableColumns = [
        'created_at',
        'mimetype',
        'name',
        'path',
        'size',
        'type',
    ];
}
