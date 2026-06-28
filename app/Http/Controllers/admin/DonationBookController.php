<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Models\DonationBook;
use App\Http\Controllers\Controller;
use App\Models\Collector;
use App\Models\Fund;
use App\Models\Receipt;
use Illuminate\Http\Request;

class DonationBookController extends Controller
{
    use AccessTrait;

    protected function Validation($request, $id = null)
    {
        return $request->validate([
            'collector_id' => 'required|exists:collectors,id',

            'book_number' => 'required|string|max:50|unique:donation_books,book_number,' . $id,

            'total_pages' => 'required|integer|min:1|max:1000',

            'date' => 'nullable|date',
            'type' => 'nullable|in:open,token20,token50,token100',

            'note' => 'nullable|string|max:500',
        ]);
    }

    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $book_number = (DonationBook::lockForUpdate()->max('book_number') ?? 999) + 1;

            $collector = Collector::get();

            $donationBook = DonationBook::get();

            return view('admin.views.create.donationBook', ['collector' => $collector, 'bookNo' => $book_number, 'donationBook' => $donationBook]);

        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->Validation($request);

        // dd($data);
        DonationBook::create($data);

        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donationBook = DonationBook::findOrFail($id);
        if ($this->hasPermission()) {

            $collector = Collector::get();

            return view('admin.views.edit.donationBook', ['donationBook' => $donationBook, 'collector' => $collector]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    public function show(string $id)
    {
        $donationBook = DonationBook::findOrFail($id);
        // (book no - 1 ) * totalPage + 1 , roshid no. 
        $lastReceipt = Receipt::where('donation_book_id', $id)->latest()->first();
        $lastbook = $donationBook->book_number === 1 ? 1 : (int) $donationBook->book_number - 1 + (int) $donationBook->total_pages;
        $receipt_no = $lastReceipt ? $lastReceipt->receipt_no + 1 : $lastbook;
        $receipts = Receipt::where('donation_book_id', $id)->latest()->get();

        $fundList = Fund::select('title', 'slug')->get();
        if ($this->hasPermission()) {

            return view('admin.views.show.receipt', compact('receipt_no', 'donationBook', 'receipts', 'fundList'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donationBook = DonationBook::findOrFail($id);
        $data = $this->Validation($request, $id);

        // dd($data); 
        if ($data && $donationBook->update($data)) {
            return redirect()->route('donationBook.create')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donationBook = DonationBook::findOrFail($id);
        if ($this->hasPermission()) {
            $donationBook->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
