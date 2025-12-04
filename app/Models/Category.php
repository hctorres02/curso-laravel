<?php

namespace App\Models;

use App\Traits\TimestampsFormatter;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TimestampsFormatter;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    #[Scope]
    protected function searchable(Builder $query, Collection $searchParams): void
    {
        $query
            ->when($searchParams->get('search'), fn ($query, $search) => $query->whereLike('name', "%{$search}%"))
            ->orderBy($searchParams->get('orderBy'), $searchParams->get('sort'));
    }
}
