<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Media extends Model
{
    protected $fillable = [
        'name',
        'path',
        'size',
        'type',
        'mimetype',
    ];

    #[Scope]
    protected function searchable(Builder $query, Collection $searchParams): void
    {
        $query
            ->when($searchParams->get('directory'), fn ($query, $directory) => $query->whereLike('path', "{$directory}%"))
            ->when($searchParams->get('search'), fn ($query, $search) => $query->whereLike('name', "%{$search}%"))
            ->orderBy($searchParams->get('orderBy'), $searchParams->get('sort'));
    }
}
