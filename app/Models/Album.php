<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use FileHandlerTrait;

    protected $fillable = ['album_name', 'image_quality', 'status', 'slug'];
    public function media()
    {
        return $this->hasMany(Media::class, 'album_id');
    }
}
