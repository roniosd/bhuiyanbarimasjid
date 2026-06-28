<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Adminlogin extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'email',
        'password',
        'full_name',
        'username',
        'phone',
        'photo',
        'last_login',
        'role_id',
        'status'
    ];
    public $timestamps = false;
    protected $hidden = ['password'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(Permission::class, 'role_id');
    }
    public function getPhotoAttribute($value)
    {
        return $value ? asset("public/storage/profile/{$value}") : null;
    }

}
