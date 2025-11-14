<?php

namespace App\Models;

use App\Traits\TimestampsFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
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
}
