<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['type', 'title', 'image', 'alt', 'description', 'status', 'album_id', 'media'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
