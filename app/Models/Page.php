<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use FileHandlerTrait;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'photo',
        'published_at',
        'description',
        'excerpt',
        'status',
        'post_id',
        'template',
        'widget'
    ];

    public function getPhotoAttribute($value)
    {
        return $value ? asset("public/storage/page/{$value}") : null;
    }
}
