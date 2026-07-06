<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Coa;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    public function index()
    {
        if ($this->hasPermission()) {
            $transactions = Transaction::with('head')->latest('id')->paginate(10);
            return view('admin.views.list.transactionList', compact('transactions'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function create()
    {
        if ($this->hasPermission()) {
            $heads = Coa::where('status', 'active')->get();
            return view('admin.views.create.addTransaction', compact('heads'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:dr,cr',
            'head_id' => 'required|exists:coa,id',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($transaction = Transaction::create($validated)) {
            $this->AdminActivity('transaction', $transaction->id, 'add');
            return back()->with('success', 'Create successfully!');
        }

        return back()->with('error', "Somthing Worng");
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        if ($this->hasPermission()) {
            $heads = Coa::where('status', 'active')->get();
            return view('admin.views.edit.editTransaction', compact('transaction', 'heads'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:dr,cr',
            'head_id' => 'required|exists:coa,id',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($transaction->update($validated)) {
            $this->AdminActivity('transaction', $transaction->id, 'edit');
            return redirect()->route('transaction.index')->with('success', 'Update successfully!');
        }

        return back()->with('error', "Somthing Worng");
    }

    public function destroy(Transaction $transaction)
    {
        if ($this->hasPermission()) {
            if ($transaction->delete()) {
                $this->AdminActivity('transaction', $transaction->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
