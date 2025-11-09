<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
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
}
