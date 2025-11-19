<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Traits\TimestampsFormatter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Post extends Model
{
    use HasFactory;
    use TimestampsFormatter;

    protected $fillable = [
        'author_id',
        'category_id',
        'cover_id',
        'title',
        'slug',
        'headline',
        'body',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => PostStatus::class,
        ];
    }

    public function bodyDecoded(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => decodeMarkdown($attributes['body'])
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cover(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('status', PostStatus::Published);
    }

    #[Scope]
    protected function searchable(Builder $query, Collection $searchParams): void
    {
        $query
            ->when($searchParams->get('category_id'), fn ($query, $category_id) => $query->where('category_id', $category_id))
            ->when($searchParams->get('search'), fn ($query, $search) => $query->whereLike('title', "%{$search}%"))
            ->when($searchParams->get('status'), fn ($query, $status) => $query->where('status', $status))
            ->orderBy($searchParams->get('orderBy'), $searchParams->get('sort'));
    }
}
