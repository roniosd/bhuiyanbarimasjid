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
    public function getLogoAttribute($value)
    {
        return $value ? asset("public/storage/logos/{$value}") : null;
    }

    public function getFaviconAttribute($value)
    {
        return $value ? asset("public/storage/logos/{$value}") : null;
    }

    public function getFlogoAttribute($value)
    {
        return $value ? asset("public/storage/logos/{$value}") : null;
    }
}
