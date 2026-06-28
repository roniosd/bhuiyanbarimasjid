<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'mobile_number',
        'nid',
        'appointed_by',
    ];

    public function donationBooks()
    {
        return $this->hasMany(DonationBook::class);
    }
}
