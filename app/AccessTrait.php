<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

trait AccessTrait
{
    public function hasPermission()
    {
        $requiredPermission = Route::currentRouteName();
        if (Auth::user()->role->id)
            return true;
        $permissions = json_decode(Auth::user()->role->methods, true);
        return in_array($requiredPermission, $permissions);
    }
}
