<?php

namespace App\Http\Requests\Admin\Comment;

use App\Traits\SearchableRequest;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    use SearchableRequest;
}
