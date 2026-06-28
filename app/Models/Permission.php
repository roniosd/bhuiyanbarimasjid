<?php

namespace App\Models;

use App\FileHandlerTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use FileHandlerTrait;

    public $timestamps = false;

    protected $fillable = [
        'status',
        'methods',
        'role_name'
    ];
}
