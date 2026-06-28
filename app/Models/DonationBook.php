<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationBook extends Model
{
    protected $fillable = [
        'collector_id',
        'book_number',
        'total_pages',
        'type',
        'date',
        'note',
    ];
    protected $casts = ['book_number' => 'integer'];
    public function collector()
    {
        return $this->belongsTo(Collector::class, 'collector_id');
    }
}
