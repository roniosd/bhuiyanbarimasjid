<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
       public $timestamps = false; // because we're using 'created' column

    protected $fillable = [
        'admin_id',
        'task',
        'component_type',
        'component_id',
        'action',
        'created',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

}
