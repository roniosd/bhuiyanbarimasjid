<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'date',
        'type',
        'head_id',
        'description',
        'amount',
    ];

    public function head()
    {
        return $this->belongsTo(Coa::class, 'head_id');
    }
}
