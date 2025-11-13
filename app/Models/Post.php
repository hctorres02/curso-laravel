<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
