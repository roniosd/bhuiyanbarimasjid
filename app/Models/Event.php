<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use FileHandlerTrait;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'slogan',
        'venue',
        'latitude',
        'longitude',
        'zoom',
        'height',
        'width',
        'city',
        'description',
        'email',
        'start_date',
        'end_date',
        'slider',
        'registration',
        'status',
        'photo',
        'slug',
        'short_description'
    ];
}
