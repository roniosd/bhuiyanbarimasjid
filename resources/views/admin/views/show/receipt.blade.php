<x-app-layout title="Add Receipt">

    <div class="content-area row  ">


        <div class="col-xxl-6 col-xl-6 col-lg-6">
            <!-- Form -->
            <div class="content-inner">
                <div class="custom-card ">
                    <div class="custom-card-header ">
                        <!-- Back Button -->
                        <a href="{{ route('donationBook.create') }}" class="btn btn-outline-secondary btn-sm">
                            ← Back
                        </a>

                        <!-- Title -->
                        <div class="text-center mb-4">
                            <h1 class="fw-bold mb-0">Donation Receipt</h1>
                            <h3 class="text-secondary">Book #{{ $donationBook->book_number }}</h3>

                            <div class="mt-2">
                                <span class="badge bg-primary fs-6 px-3 py-2">
                                    Receipt No: {{ $receipt_no }}
                                </span>
                            </div>
                        </div>

                        <!-- Spacer (keeps center aligned) -->
                        <div style="width: 70px;"></div>

                    </div>
                    <form action="{{ route('receipt.store') }}" method="POST">
                        @csrf


                        <input type="hidden" name="donation_book_id" value="{{ $donationBook->id }}">
                        <input type="hidden" name="receipt_no" value="{{ $receipt_no }}">


                        <div class="row g-3">
                            <!-- Date -->
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" value="{{ old('date') }}" class="form-control">
                            </div>
                            @if ($donationBook->type === 'open')
                                <div class="col-md-6">
                                    <label class="form-label">Donation Type</label>
                                    <select name="type" class="form-select form-control">
                                        @foreach (['সাধারণ', 'মাসিক'] as $value)
                                            <option value="{{ $value }}" @selected(old('member_type') == $value)>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        <optgroup label="Fund List">
                                            @foreach ($fundList as $fund)
                                                <option value="{{ $fund->title }}" @selected(old('member_type') == $fund->title)>
                                                    {{ $fund->title }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>



                                <!-- Donor Name -->
                                <div class="col-md-6" id="donorField">
                                    <label class="form-label">Donor Name</label>
                                    <input type="text" id="donorName" name="donor_name"
                                        value="{{ old('donor_name') }}" class="form-control"
                                        placeholder="Enter donor name">
                                </div>

                                <!-- Mobile -->
                                <div class="col-md-6">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" id="mobileInput" name="mobile_number"
                                        value="{{ old('mobile_number') }}" class="form-control"
                                        placeholder="01XXXXXXXXX">
                                </div>


                                <!-- Sector -->
                                <div class="col-md-6">
                                    <label class="form-label">Sector</label>
                                    <input type="text" name="sector" value="{{ old('sector') }}"
                                        class="form-control" placeholder="e.g. Education" id="sector">
                                </div>
                            @endif

                            <!-- Amount -->
                            <div class="col-md-6">
                                <label class="form-label">Amount</label>
                                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}"
                                    class="form-control" placeholder="Enter amount">
                            </div>

                            @if ($donationBook->type === 'open')
                                <!-- Anonymous -->
                                <div class="col-12">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_anonymous"
                                            value="1" id="anonymousCheck">
                                        <label class="form-check-label" for="anonymousCheck">
                                            নাম প্রকাশে অনিচ্ছুক
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Submit -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4 rounded-3">
                                ➕ Add Receipt
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="sidebar-widgets mt-4">
                <div class="container">
                    <div class="table-responsive">
                        <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                            <thead class="">
                                <tr>
                                    <th> Name</th>
                                    <th>Amount</th>
                                    <th>Mobile no</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receipts as $receipt)
                                    <tr>
                                        <td>{{ $receipt->donor_name }}</td>
                                        <td>{{ $receipt->amount }}</td>
                                        <td>{{ $receipt->mobile_number }}</td>
                                        <td>{{ $receipt->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- UX Script -->
        <script>
            document.getElementById('anonymousCheck').addEventListener('change', function() {
                document.getElementById('donorField').style.display =
                    this.checked ? 'none' : 'block';
            });
        </script>


</x-app-layout>
