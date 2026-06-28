<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationBook;
use App\Models\Receipt;
use App\Services\SmsService;

class ReceiptController extends Controller
{

    protected function Validation($request)
    {
        return $request->validate([
            'donation_book_id' => 'required|exists:donation_books,id',

            'date' => 'required|date',

            'receipt_no' => 'required|string|max:50|unique:receipts,receipt_no',

            'mobile_number' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(?:\+8801|01)[3-9]\d{8}$/',
            ],

            'donor_name' => 'nullable|string|max:120',
            'sector' => 'nullable|string|max:120',
            'type' => 'nullable|string',

            'amount' => 'required|numeric|min:1|max:100000000',

            'is_anonymous' => 'nullable|boolean',
        ]);
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SmsService $smsService)
    {
        $data = $this->Validation($request);
        $book = DonationBook::findOrFail($request->donation_book_id);
        $total = Receipt::where('donation_book_id', $request->donation_book_id)->count();

        if ($total > $book->total_pages) {
            return back()->withErrors([
                'receipt_no' => 'This book is full. No more receipts can be added.'
            ]);
        }


        if (isset($data['mobile_number'])) {
            $message = "প্রিয় " . ($data['donor_name'] ?? 'সদস্য') . ", "
                . "আপনি ভূঁইয়া বাড়ি বায়তুল মামুর জামে মসজিদে {$data['type']} খাতে {$data['amount']} টাকা অনুদান প্রদান করেছেন। "
                . "ধন্যবাদান্তে BBBMJM";
            $smsService->sendMessage($data['mobile_number'], $message);
        }

        Receipt::create($data);

        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function findDonor(Request $request)
    {
        $mobile = $request->mobile;


        $donor = Receipt::where('mobile_number', $mobile)
            ->whereNotNull('donor_name')
            ->latest()
            ->first();

        if (!$donor) {
            return response()->json(null);
        }

        return response()->json([
            'name' => $donor->donor_name,
            'sector' => $donor->sector,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
