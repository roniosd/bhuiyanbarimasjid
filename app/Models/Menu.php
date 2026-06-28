<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'route_type',
        'route',
        'menu_type',
        'place',
        'parent',
        'status',
        'position'
    ];

    public function submenu(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent');
    }

    // The parent menu for this submenu
    public function parentMenu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'route');
    }
}
