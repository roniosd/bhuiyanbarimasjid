<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Adminlogin;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $admins = Adminlogin::get();
            return view('admin.views.list.adminList', ['admins' => $admins]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $permissions = Permission::all();
            return view('admin.views.create.createAdmin', compact('permissions'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:adminlogins,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ], [
            'confirm_password.same' => 'Passwords must match.',
            'role_id' => 'required'
        ]);

        //! Profile Image Upload
        $profileImage = null;
        if ($request->hasFile('photo')) {
            $profileImage = $this->uploadPhoto($request->file('photo'), 'profile');
        }
        //! Admin Create
        Adminlogin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'status' => $request->status ?? 'active',
            'role_id' => $request->role,
            'photo' => $profileImage,
        ]);

        return back()->with('success', 'Registration successful!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Adminlogin::find($id);
        $permissions = Permission::all();

        return view('admin.views.update.updateAdmin', compact('admin', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'full_name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'role' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $admin = Adminlogin::findOrFail($id);

        if ($request->hasFile('photo')) {
            $this->deletePhoto($admin->photo, 'profile');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'profile');
        }

        $data['status'] = $data['status'] ?? 'active';
        $data['role_id'] = $data['role'];

        $admin->update($data);

        return back()->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adminlogin = Adminlogin::find($id);
        if ($this->hasPermission()) {
            $this->deletePhoto($adminlogin->photo, 'profile');
            $adminlogin->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
