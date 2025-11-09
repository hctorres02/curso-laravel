<?php

namespace App\Models;

use App\Enums\CommentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
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
}
