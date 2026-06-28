<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use FileHandlerTrait;
    public $timestamps = false;
    protected $fillable = [
        'fund_id',
        'donar',
        'contact',
        'amount',
        'transaction_time',
        'timezone',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_time' => 'datetime',
    ];

    public function fund()
    {
        return $this->belongsTo(Fund::class, 'fund_id');
    }
}
