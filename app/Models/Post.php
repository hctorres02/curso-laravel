<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Traits\TimestampsFormatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
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
}
