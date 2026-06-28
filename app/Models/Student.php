<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'class',
        'session',
        'name_bn',
        'name_en',
        'birth_reg_no',
        'dob',
        'image',
        'father_name',
        'mother_name',
        'mobile',
        'email',
        'nationality',
        'blood_group',
        'guardian_name',
        'previous_school',
    ];
    public function student_contact()
    {
        return $this->hasMany(StudentContact::class);
    }


    public function presentAddress()
    {
        return $this->hasOne(StudentContact::class)->where('type', 'present');
    }

    public function permanentAddress()
    {
        return $this->hasOne(StudentContact::class)->where('type', 'permanent');
    }

}
