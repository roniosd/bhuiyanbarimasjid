<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberContact extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'member_id',
        'type',
        'village',
        'post',
        'subdistrict',
        'district',
        'preVillage',
        'prePost',
        'preSubdistrict',
        'preDistrict',
    ];
    public function member(): BelongsTo{
        return $this->belongsTo(Member::class, 'member_id');
    }
}
