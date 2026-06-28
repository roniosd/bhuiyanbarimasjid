<?php
namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use AccessTrait, FileHandlerTrait;
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $allMenus = Menu::all();
            $pages = Page::all();

            return view('admin.views.create.addMenu', compact('allMenus', 'pages'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'route_type' => 'nullable',
            'menu_type' => 'required',
            'status' => 'required',
            'place' => 'nullable|string',
            'parent' => 'nullable',
            'position' => 'nullable',
        ]);
        $validated['route'] = $request->input('url_input')
            ?? $request->input('page_select')
            ?? $request->input('category_type');
        if (Menu::create($validated)) {
            return back()->with('success', 'Create successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        if ($this->hasPermission()) {
            $allMenus = Menu::all();
            $pages = Page::all();

            return view('admin.views.edit.editMenu', compact('allMenus', 'pages', 'menu'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'route_type' => 'nullable',
            'menu_type' => 'nullable',
            'status' => 'nullable',
            'place' => 'nullable|string',
            'parent' => 'nullable',
            'position' => 'nullable',
        ]);
        $validated['route'] = $request->input('url_input')
            ?? $request->input('page_select')
            ?? $request->input('category_type');

        if ($menu->update($validated)) {
            return redirect()->route('menu.create')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    public function show(Menu $menu)
    {
        if ($this->hasPermission()) {
            $allMenus = Menu::all();
            $pages = Page::all();

            return view('admin.views.create.addMenu', compact('allMenus', 'pages', 'menu'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($this->hasPermission()) {
            if ($menu->delete()) {
                $this->AdminActivity($menu->menu_type, $menu->id, 'delete');

                return back()->with('success', 'Menu Deleted Successfully');
            } else {
                return back()->with('error', 'Menu Data Not Deleted');
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
