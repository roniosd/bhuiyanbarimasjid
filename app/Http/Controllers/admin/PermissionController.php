<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use FileHandlerTrait, AccessTrait;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $modules = $this->routeNames();
            $permissions = Permission::all()->map(function ($permission) {
                $permission->methods = collect(explode(',', $permission->methods))
                    ->map(function ($method, $index) {
                        return ($index + 1)
                            . ucwords(str_replace(['.', '_', '"', '[', ']'], ' ', trim($method)));
                    })
                    ->implode(', ');

                return $permission;
            });
            ;
            return view('admin.views.create.addPermission', compact('modules', 'permissions'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string',
            'methods' => 'required|array',
            'status' => 'required'
        ]);
        $validated['methods'] = json_encode($validated['methods']);
        $Permission = Permission::create($validated);

        if ($Permission) {
            $this->AdminActivity('permission', $Permission->id, 'add');
            return back()->with('success', 'Permission Add Successfully');
        } else {
            return back()->with('error', 'Permission Data Not Saved');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $Permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        if ($this->hasPermission()) {
            $modules = $this->routeNames();
            return view('admin.views.edit.editPermission', compact('permission', 'modules'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $Permission)
    {
        $validated = $request->validate([
            'role_name' => 'required',
            'methods' => 'required|array',
            'status' => 'required'
        ]);
        $validated['methods'] = json_encode($validated['methods']);

        if ($Permission->update($validated)) {
            $this->AdminActivity('Permission', $Permission->id, 'edit');

            return redirect()->route('permission.create')->with('success', 'Permission Update Successfully');
        } else {
            return back()->with('error', 'Permission Data Not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $Permission)
    {
        if ($this->hasPermission()) {
            if ($Permission->delete()) {
                $this->AdminActivity('permission', $Permission->id, 'delete');

                return back()->with('success', 'Permission Deleted Successfully');
            } else {
                return back()->with('error', 'Permission Data Not Deleted');
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
