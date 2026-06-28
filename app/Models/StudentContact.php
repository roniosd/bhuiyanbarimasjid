<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    protected $fillable = [
        'village',
        'post',
        'subdistrict',
        'district',
        'type',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
