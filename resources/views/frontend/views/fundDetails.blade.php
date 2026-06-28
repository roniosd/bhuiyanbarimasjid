<x-FornAppLayout>
    <section class="top_header text-center">
        <p>{{$fund->title}}</p>
    </section>
    <section style="background: #E5F9ED;" class="about_box_section donation-details py-5">
        <div class="container">
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12 border-0">
                    <img style="height: 432px;"
                        src="{{ $fund->featured_photo ?? asset('/public/storage/default/category.png') }}"
                        alt="Musque" />
                    <p>
                        {!! $fund->description !!}

                    </p>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #E5F9ED;" class="Member_information_section">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-12 col-lg-6 {{$fund->show_membership ? '' : 'd-none'}}">
                    <div class="box border-0" style="background: #fff;">
                        <h5 class="mb-3">সদস্য হোন</h5>
                        <p>
                            মসজিদ নির্মান প্রজেক্টে এককালীন কমপক্ষে ১০০,০০০ (এক লক্ষ) বা
                            তদূর্ধ টাকা দান করে ফাউন্ডেশনের আজীবন সদস্য এবং এককালীন কমপক্ষে
                            ৫০,০০০ (পঞ্চাশ হাজার) বা তদূর্ধ টাকা দান করে দাতা সদস্য হওয়া
                            যাবে।
                            <br /><br />
                            <a href="{{ route('member') }}">আজীবন সদস্য ও দাতা সদস্য হওয়ার জন্য এখানে ক্লিক
                                করুন।</a><br /><br />
                            আজীবন সদস্য ও দাতা সদস্যগণ আমৃত্যু ফাউন্ডেশনের সদস্য থাকবেন।
                            ফাউন্ডেশনের স্বার্থে প্রয়োজন অনুযায়ী তাঁদের পরামর্শ চাওয়া হবে
                            এবং সময়ে সময়ে বিভিন্ন কার্যক্রম সম্পর্কে অবহিত করা হবে এবং
                            সম্মাননা সনদ প্রদান করা হবে।
                        </p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div style="background: #fff;" class="box box-2 border-0">
                        <h5 class="mb-3">অনুদান সম্পর্কিত তথ্য</h5>
                        <p>{{$fund->donation_info}}
                        </p>
                        <div class="payment_method {{$fund->show_payment_method ? '' : 'd-none'}}">
                            <div class="highlight">
                                <div class="row mb-2">
                                    <div class="col-5">অ্যাকাউন্টের নাম :</div>
                                    <div class="col-7">Bhuiyan Bari Baitul Mamur Jame Mosque.</div>

                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">অ্যাকাউন্ট নম্বর :</div>
                                    <div class="col-7">13404</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">ব্যাংক :</div>
                                    <div class="col-7">Islami Bank Bangladesh PLC.</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">শাখা :</div>
                                    <div class="col-7">Mawna Chowrasta Branch</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">SWIFT কোড :</div>
                                    <div class="col-7">IBBLBDDH158</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">রাউটিং নম্বর :</div>
                                    <div class="col-7">125331038</div>
                                </div>
                            </div>
                            {{-- <p class="Do_call">বিকাশ/নগদ মার্চেন্ট :01958277608</p> --}}
                        </div>

                        @php
                            $donation_unit = $fund->donation_unit; // keep it numeric for calculations
                            $donation_unit_formatted = number_format($donation_unit); // format for display only
                        @endphp

                        <div class="mb-3 valuation">
                            <p>* অনলাইনে প্রদেয় সর্বনিম্ন অনুদানের পরিমাণ
                                {{ $fund->getBangla($donation_unit_formatted) }} টাকা
                            </p>
                            <div class="money_box d-grid">
                                @for ($amount = $donation_unit; $amount <= $donation_unit * 9; $amount += $donation_unit)
                                    <button class="addTaka" type="button" onclick="setAmount({{ $amount }}, this)">
                                        {{ $fund->getBangla(number_format($amount)) }} টাকা
                                    </button>
                                @endfor
                            </div>
                        </div>


                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" onchange="toggleCustomAmount()"
                                id="AmountCheck" />
                            <label class="form-check-label" for="AmountCheck">যেকোনো পরিমাণ অনুদান</label>
                        </div>
                        <form action="{{ url('/donation') }}" method="POST">
                            @csrf
                            <div class="donate-btnSection">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="">অনুদানের পরিমাণঃ </label>
                                    <input name="amount" min="1000" type="number" id="donationAmount" readonly
                                        class="form-control" placeholder="অনুদানের পরিমান। উদাহরণ: ১০০০" />
                                </div>
                                <input type="hidden" name="fund_id" value="{{$fund->id}}" id="">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <label for="">নামঃ </label>
                                    <input type="text" name="doner" placeholder="আপনার নাম লিখুন"
                                        class="form-control" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <label for="">মোবাইল / ইমেইলঃ </label>
                                    <input name="contact" type="text" placeholder="মোবাইল / ইমেইল"
                                        class="form-control" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button class="btn btn-3">অনুদান করুন</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-FornAppLayout>
