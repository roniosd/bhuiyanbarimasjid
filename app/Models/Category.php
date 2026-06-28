<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'photo',
        'slug',
        'description',
        'count',
        'status',
        'type',
        'is_parent'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
