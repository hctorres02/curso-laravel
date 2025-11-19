<?php

namespace App\Models;

use App\Traits\TimestampsFormatter;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasFactory;
    use TimestampsFormatter;

    protected $fillable = [
        'avatar_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    #[Scope]
    protected function searchable(Builder $query, Collection $searchParams): void
    {
        $query
            ->when($searchParams->get('role'), fn ($query, $role) => $query->where('role', $role))
            ->when($searchParams->get('search'), fn ($query, $search) => $query->whereAny(['email', 'name'], 'LIKE', "%{$search}%"))
            ->orderBy($searchParams->get('orderBy'), $searchParams->get('sort'));
    }
}
