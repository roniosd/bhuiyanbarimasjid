<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'favicon',
        'flogo',
        'logo',
        'mlogo',
        'title',
        'tagline',
        'tnt',
        'header',
        'slider',
        'email',
        'phone',
        'address',
        'description',
        'copyright',
        'terms',
        'social_links'
    ];
}
