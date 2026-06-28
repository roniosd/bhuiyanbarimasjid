<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'btn_label', 'btn_link', 'short_descreption', 'status', 'photo', 'sections'];
}
