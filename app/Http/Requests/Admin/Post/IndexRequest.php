<?php

namespace App\Http\Requests\Admin\Post;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\User;
use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

    public function rules(): array
    {
        return $this->defaultRules([
            'author_id' => ['nullable', Rule::exists(User::class, 'id')],
            'category_id' => ['nullable', Rule::exists(Category::class)],
            'status' => ['nullable', Rule::enum(PostStatus::class)],
        ]);
    }
}
