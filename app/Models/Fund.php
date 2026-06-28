<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use FileHandlerTrait, HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'featured_photo',
        'show_membership',
        'donation_info',
        'show_payment_method',
        'donation_unit',
        'status',
        'slug'
    ];

}
