<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'position',
        'btn_label',
        'btn_link',
        'category',
        'status',
        'description',
        'photo',
    ];
}
