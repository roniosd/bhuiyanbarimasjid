<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use FileHandlerTrait;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'status',
        'short_description',
        'slug'
    ];
}
