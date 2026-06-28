<x-FornAppLayout>
    <section class="top_header text-center">
        <p>ভর্তি ফর্ম</p>
    </section>
    <section style="background: #e5f9ed">
        <div class="container pt-5 pb-5">
            <div class="card" style="border:none;">
                <div class="card-body">
               
                    <h3 class="text-center text-danger">ইসলামী নব জাগরণ মসজিদ-মাদ্রাসা কমপ্লেক্স</h3>
                    <p class="text-center text-muted">ছড়াপাড়া, ৭নং ওয়ার্ড, রাউজান পৌরসভা, চট্টগ্রাম</p>

                    <form method="POST" action="{{url('storeStudent')}}" enctype="multipart/form-data">
                        @csrf

                        {{-- ফরম নং, শ্রেণি, শিক্ষাবর্ষ --}}
                        <div class="row mb-5">
                            <h4>ফরম নং : <span>{{$formNo}}</span></h4>

                        </div>

                        {{-- নাম --}}
                        <div class="row">
                            <h5 class="custom-subheading">ব্যক্তিগত তথ্যঃ</h5>
                            <div class="col-md-4 mb-3">
                                <label>নাম (বাংলায়)</label>
                                <input type="text" name="name_bn" class="form-control" required
                                    placeholder="বাংলায় নাম লিখুন" value="{{ old('name_bn') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Name (ইংরেজিতে)</label>
                                <input type="text" name="name_en" class="form-control" required
                                    placeholder="Name in English" value="{{ old('name_en') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="image">ছবি</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>

                        </div>

                        {{-- জন্ম তথ্য --}}
                        <div class="row mb-3">
                            <div class="col-md-4 mt-3">
                                <label>শ্রেণি</label>
                                <select name="class" class="form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach (['১ম', '২য়', '৩য়', '৪র্থ', '৫ম', '৬ষ্ঠ', '৭ম', '৮ম', '৯ম', '১০ম'] as $cls)
                                        <option value="{{ $cls }}" {{ old('class') == $cls ? 'selected' : '' }}>{{ $cls }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label>শিক্ষাবর্ষ</label>
                                <select name="session" class="form-control" required>
                                    <option value="" disabled selected>শিক্ষাবর্ষ নির্বাচন করুন</option>
                                    @for ($i = 0; $i < 10; $i++)
                                        @php
                                            $year = date('Y') - $i;
                                        @endphp
                                        <option value="{{ $year }}" {{ old('session') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label>জন্ম নিবন্ধন নম্বর</label>
                                <input type="text" name="birth_reg_no" class="form-control"
                                    placeholder="জন্ম নিবন্ধন নম্বর" value="{{ old('birth_reg_no') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>জন্ম তারিখ</label>
                                <input type="date" name="dob" class="form-control" required value="{{ old('dob') }}">
                            </div>

                            <div class="col-md-4 mt-3">
                                <label>পিতার নাম</label>
                                <input type="text" name="father_name" class="form-control" placeholder="পিতার নাম"
                                    value="{{ old('father_name') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>মাতার নাম</label>
                                <input type="text" name="mother_name" class="form-control" placeholder="মাতার নাম"
                                    value="{{ old('mother_name') }}">
                            </div>

                            {{-- স্থায়ী ঠিকানা --}}
                            <div class="mt-4">
                                <h5 class="custom-subheading">স্থায়ী ঠিকানাঃ</h5>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="village">গ্রাম <sup>*</sup></label>
                                        <input type="text" class="form-control" id="village" name="village"
                                            placeholder="গ্রামের নাম লিখুন" value="{{ old('village') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="post">পোস্ট <sup>*</sup></label>
                                        <input type="text" class="form-control" id="post" name="post"
                                            placeholder="ডাকঘর" value="{{ old('post') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="subdistrict">উপজেলা <sup>*</sup></label>
                                        <input type="text" class="form-control" id="subdistrict" name="subdistrict"
                                            placeholder="উপজেলার নাম" value="{{ old('subdistrict') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="district">জেলা <sup>*</sup></label>
                                        <input type="text" class="form-control" id="district" name="district"
                                            placeholder="জেলার নাম" value="{{ old('district') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- বর্তমান ঠিকানা --}}
                            <div class="mt-4">
                                <h5 class="custom-subheading">বর্তমান ঠিকানাঃ</h5>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="preVillage">গ্রাম</label>
                                        <input type="text" class="form-control" id="preVillage" name="preVillage"
                                            placeholder="গ্রামের নাম" value="{{ old('preVillage') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="prePost">পোস্ট</label>
                                        <input type="text" class="form-control" id="prePost" name="prePost"
                                            placeholder="ডাকঘর" value="{{ old('prePost') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="preSubdistrict">উপজেলা</label>
                                        <input type="text" class="form-control" id="preSubdistrict"
                                            name="preSubdistrict" placeholder="উপজেলার নাম"
                                            value="{{ old('preSubdistrict') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="preDistrict">জেলা</label>
                                        <input type="text" class="form-control" id="preDistrict" name="preDistrict"
                                            placeholder="জেলার নাম" value="{{ old('preDistrict') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- যোগাযোগ --}}
                        <div class="row mb-3">
                            <h5 class="custom-subheading">যোগাযোগঃ</h5>
                            <div class="col-md-4 mt-3">
                                <label>যোগাযোগ (মোবাইল/টেলিফোন নম্বর)</label>
                                <input type="text" name="mobile" class="form-control" placeholder="মোবাইল নম্বর"
                                    value="{{ old('mobile') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>ইমেল (যদি থাকে)</label>
                                <input type="email" name="email" class="form-control" placeholder="ইমেইল লিখুন"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>জাতীয়তা</label>
                                <input type="text" name="nationality" class="form-control" placeholder="বাংলাদেশী"
                                    value="{{ old('nationality') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>রক্তের গ্রুপ</label>
                                <select name="blood_group" class="form-control" required>
                                    <option value="" disabled selected>রক্তের গ্রুপ নির্বাচন করুন</option>

                                    @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                        <option value="{{ $group }}" {{ old('blood_group') == $group ? 'selected' : '' }}>
                                            {{ $group }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label>পিতা/মাতা অথবা অভিভাবক</label>
                                <input type="text" name="guardian_name" class="form-control" placeholder="অভিভাবকের নাম"
                                    value="{{ old('guardian_name') }}">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>পূর্বে অধ্যয়নরত প্রতিষ্ঠানের নাম</label>
                                <input type="text" name="previous_school" class="form-control"
                                    placeholder="পূর্বের প্রতিষ্ঠানের নাম" value="{{ old('previous_school') }}">
                            </div>
                        </div>

                        {{-- অভিভাবক পত্র --}}
                        <div class="alert alert-warning mt-4">
                            <h5 class="text-center text-danger">অঙ্গীকার পত্র</h5>
                            <ol class="small ps-3">
                                <li>আমি স্বীকার করছি যে, আমার ছেলে/মেয়ে সর্ববিষয়ে কুরআন সুন্নাহ মোতাবেক শিক্ষা গ্রহণ
                                    করিতে বাধ্য থাকিবে।</li>
                                <li>মাদ্রাসার কোনো নিয়ম ভঙ্গ করিলে কর্তৃপক্ষ যে সিদ্ধান্ত নিবে আমি তা মেনে নিব।</li>
                                <li>মাদ্রাসায় নির্ধারিত ইউনিফর্ম পরিধান বাধ্যতামূলক।</li>
                                <li>পড়ালেখা চলাকালীন কোন কোচিং/প্রাইভেট এ অংশগ্রহণ করতে পারবে না।</li>
                                <li>মাদ্রাসা পরিবর্তন করতে চাইলে এক মাস আগে আবেদন করতে হবে।</li>
                                <li>আমি/আমার ছেলে/মেয়ে কোনো সরকারি সাহায্য পেলে তার কপি জমা দিব।</li>
                            </ol>
                        </div>

                        {{-- সাবমিট --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5">ফর্ম সাবমিট করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-FornAppLayout>