<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'full_name',
        'father',
        'mother',
        'dob',
        'mobile',
        'email',
        'occupation',
        'workspace',
        'education',
        'photo',
        'status',
        'member_type',
        'note'
    ];
    public function member_contact()
    {
        return $this->hasMany(MemberContact::class, 'member_id');
    }

    public function presentAddress()
    {
        return $this->hasOne(MemberContact::class)->where('type', 'present');
    }

    public function permanentAddress()
    {
        return $this->hasOne(MemberContact::class)->where('type', 'permanent');
    }

    public function getPhotoAttribute($value)
    {
        return $value ? asset("public/storage/member/{$value}") : null;
    }
}
