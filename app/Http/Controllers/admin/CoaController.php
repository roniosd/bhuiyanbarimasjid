<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Coa;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    public function index()
    {
        if ($this->hasPermission()) {
            $coas = Coa::with('parent')->latest('id')->get();
            return view('admin.views.list.coaList', compact('coas'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function create()
    {
        if ($this->hasPermission()) {
            $parents = Coa::where('is_child', 'no')->where('status', 'active')->get();
            return view('admin.views.create.addCoa', compact('parents'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:dr,cr',
            'head' => 'required|string|max:100',
            'is_child' => 'required|in:yes,no',
            'parent_head' => 'nullable|required_if:is_child,yes|exists:coa,id',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validated['is_child'] === 'no') {
            $validated['parent_head'] = null;
        }

        if ($coa = Coa::create($validated)) {
            $this->AdminActivity('coa', $coa->id, 'add');
            return back()->with('success', 'Create successfully!');
        }

        return back()->with('error', "Somthing Worng");
    }

    public function show(Coa $coa)
    {
        //
    }

    public function edit(Coa $coa)
    {
        if ($this->hasPermission()) {
            $parents = Coa::where('id', '!=', $coa->id)->where('is_child', 'no')->where('status', 'active')->get();
            return view('admin.views.edit.editCoa', compact('coa', 'parents'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function update(Request $request, Coa $coa)
    {
        $validated = $request->validate([
            'type' => 'required|in:dr,cr',
            'head' => 'required|string|max:100',
            'is_child' => 'required|in:yes,no',
            'parent_head' => 'nullable|required_if:is_child,yes|exists:coa,id',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validated['is_child'] === 'no') {
            $validated['parent_head'] = null;
        }

        if ($coa->update($validated)) {
            $this->AdminActivity('coa', $coa->id, 'edit');
            return redirect()->route('coa.index')->with('success', 'Update successfully!');
        }

        return back()->with('error', "Somthing Worng");
    }

    public function destroy(Coa $coa)
    {
        if ($this->hasPermission()) {
            if ($coa->delete()) {
                $this->AdminActivity('coa', $coa->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
