<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'donation_book_id',
        'date',
        'receipt_no',
        'mobile_number',
        'donor_name',
        'sector',
        'amount',
        'type',
        'is_anonymous',
    ];

    protected $casts = [
        'date' => 'date',
        'is_anonymous' => 'boolean',
        'amount' => 'decimal:2',
    ];

    public function book()
    {
        return $this->belongsTo(DonationBook::class, 'donation_book_id');
    }
}
