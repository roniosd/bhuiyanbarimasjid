<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FornAppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $setting = Setting::first();
        $menus = Menu::where('status', 'active')->get();
        return view('frontend.layout.app2', compact('setting', 'menus'));
    }
}
