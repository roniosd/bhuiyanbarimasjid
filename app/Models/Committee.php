<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = [
        'session_id',
        'designation',
        'name',
        'mobile_number',
        'email',
        'photo',
        'membership_fee',
        'status',
        'type'
    ];

    public function getPhotoAttribute($value)
    {
        return $value ? asset("public/storage/committee/{$value}") : null;
    }
}
