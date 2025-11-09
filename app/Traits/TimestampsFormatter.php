<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TimestampsFormatter
{
    public function createdAtDate(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['created_at'])->format('d/m/Y')
        );
    }

    public function createdAtDateTime(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['created_at'])->format('d/m/Y H:i:s')
        );
    }

    public function createdAtRelative(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['created_at'])->diffForHumans()
        );
    }

    public function updatedAtDate(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['updated_at'])->format('d/m/Y')
        );
    }

    public function updatedAtDateTime(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['updated_at'])->format('d/m/Y H:i:s')
        );
    }

    public function updatedAtRelative(): Attribute
    {
        return Attribute::get(
            fn (mixed $value, array $attributes) => parseDate($attributes['updated_at'])->diffForHumans()
        );
    }
}
