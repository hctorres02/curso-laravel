<?php

namespace App\Models;

use App\Enums\CommentStatus;
use App\Traits\ScopeMonthly;
use App\Traits\TimestampsFormatter;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Comment extends Model
{
    use HasFactory;
    use ScopeMonthly;
    use SoftDeletes;
    use TimestampsFormatter;

    protected $fillable = [
        'author_id',
        'post_id',
        'body',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => CommentStatus::class,
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    #[Scope]
    protected function searchable(Builder $query, Collection $searchParams): void
    {
        $query
            ->when($searchParams->get('status'), fn ($query, $status) => $query->where('status', $status))
            ->orderBy($searchParams->get('orderBy'), $searchParams->get('sort'));
    }
}
