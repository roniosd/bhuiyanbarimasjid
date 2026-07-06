<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    public $timestamps = false;

    protected $table = 'coa';

    protected $fillable = [
        'type',
        'head',
        'is_child',
        'parent_head',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Coa::class, 'parent_head');
    }

    public function children()
    {
        return $this->hasMany(Coa::class, 'parent_head');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'head_id');
    }
}
