<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use FileHandlerTrait;

    public $timestamps = true;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'description',
        'attachment',
        'excerpt',
        'photo',
        'type',
        'news_type',
        'status',
        'category_id',
        'short_description',
        'tags',
        'author',
        'view',
        'rating',
        'published_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function authored(): BelongsTo
    {
        return $this->belongsTo(Adminlogin::class, 'author');
    }
    public function getPhotoAttribute($value)
    {
        return $value ? asset("public/storage/post/{$value}") : null;
    }
 

}
