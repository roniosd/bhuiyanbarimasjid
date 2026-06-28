<x-FornAppLayout>
    <section class="top_header text-center bg-success text-white py-3 shadow-sm">
        <h2 class="mb-0 fw-bold">সদস্য নিবন্ধন ফরম</h2>
    </section>

    <section style="background: #F4FAF6;" class="donation-section py-5">
        <div class="container">
            <div class="card border-0 shadow-lg p-4 rounded-4 bg-white">
                <form action="{{ url('storeMember') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Member Info Section -->
                    <div class="mb-4 border-bottom pb-3">
                        <h4 class="custom-subheading text-success fw-bold mb-3">ব্যক্তিগত তথ্য</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="member_type" class="form-label">সদস্য ধরন <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="member_type" name="member_type" required>
                                    <option value="">সদস্য ধরন নির্বাচন করুন</option>
                                    <option value="social" {{ old('member_type') == 'social' ? 'selected' : '' }}>
                                        সামাজিক সদস্য</option>
                                    <option value="general" {{ old('member_type') == 'general' ? 'selected' : '' }}>
                                        সাধারণ
                                        সদস্য</option>
                                    <option value="premium" {{ old('member_type') == 'doner' ? 'selected' : '' }}>দাতা
                                        সদস্য</option>
                                    <option value="vip" {{ old('member_type') == 'life' ? 'selected' : '' }}>আজীবন
                                        সদস্য
                                    </option>
                                </select>
                            </div>


                            <!-- Social Member Extra Field -->
                            <div class="col-md-6 d-none" id="socialFieldWrapper">
                                <label for="donation_amount" class="form-label">
                                    চাঁদার পরিমাণ
                                </label>
                                <input type="text" class="form-control" id="donation_amount" name="donation_amount"
                                    value="{{ old('donation_amount') }}" placeholder="চাঁদার পরিমাণ">
                            </div>

                            <div class="col-md-6" id="image">
                                <label for="photo" class="form-label">ছবি <span
                                        class="text-muted">(jpg/png)</span></label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                    accept="image/*">
                            </div>
                        </div>
                    </div>

                    <!-- Basic Info -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label">পূর্ণ নাম <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ old('full_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">জন্মতারিখ <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="{{ old('dob') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="father" class="form-label">পিতার নাম <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="father" name="father"
                                value="{{ old('father') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mother" class="form-label">মাতার নাম <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mother" name="mother"
                                value="{{ old('mother') }}" required>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">মোবাইল নাম্বার <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                value="{{ old('mobile') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">ইমেইল</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="row g-3 mt-4">
                        <div class="col-md-12">
                            <label for="note" class="form-label">নোট</label>

                            <textarea class="form-control" id="note" name="note" rows="4">{{ old('note') }}</textarea>

                        </div>
                    </div>

                    <!-- Address Info -->
                    <div class="mt-5">
                        <h4 class="custom-subheading text-success fw-bold mb-3">স্থায়ী ঠিকানা</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="village" class="form-label">গ্রাম <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="village" name="village"
                                    value="{{ old('village') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="post" class="form-label">পোস্ট <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="post" name="post"
                                    value="{{ old('post') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="subdistrict" class="form-label">উপজেলা <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subdistrict" name="subdistrict"
                                    value="{{ old('subdistrict') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="district" class="form-label">জেলা <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="district" name="district"
                                    value="{{ old('district') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Present Address -->
                    <div class="mt-5">
                        <h4 class="custom-subheading text-success fw-bold mb-3">বর্তমান ঠিকানা</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="preVillage" class="form-label">গ্রাম</label>
                                <input type="text" class="form-control" id="preVillage" name="preVillage"
                                    value="{{ old('preVillage') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="prePost" class="form-label">পোস্ট</label>
                                <input type="text" class="form-control" id="prePost" name="prePost"
                                    value="{{ old('prePost') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="preSubdistrict" class="form-label">উপজেলা</label>
                                <input type="text" class="form-control" id="preSubdistrict" name="preSubdistrict"
                                    value="{{ old('preSubdistrict') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="preDistrict" class="form-label">জেলা</label>
                                <input type="text" class="form-control" id="preDistrict" name="preDistrict"
                                    value="{{ old('preDistrict') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Other Information -->
                    <div class="mt-5">
                        <h4 class="custom-subheading text-success fw-bold mb-3">অন্যান্য তথ্য</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="occupation" class="form-label">পেশা</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    value="{{ old('occupation') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="workspace" class="form-label">কর্মস্থল</label>
                                <input type="text" class="form-control" id="workspace" name="workspace"
                                    value="{{ old('workspace') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="education" class="form-label">শিক্ষাগত যোগ্যতা</label>
                                <input type="text" class="form-control" id="education" name="education"
                                    value="{{ old('education') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Declaration -->
                    <div class="mt-5">
                        <h4 class="custom-subheading text-success fw-bold mb-3">শপথ নামা</h4>
                        <ol class="ps-4 small">
                            <li>আমি সংগঠনের সকল সাধারণ সভায় অংশগ্রহণে বাধ্য থাকিব।</li>
                            <li>আমার উপর অর্পিত দায়িত্ব যথাযথভাবে পালন করিব।</li>
                            <li>সংগঠনের নিয়মনীতি মেনে চলিব।</li>
                            <li>কোনো অসামাজিক/অনৈতিক কার্যকলাপে লিপ্ত থাকিব না।</li>
                            <li>সংগঠনের সুনাম ক্ষুণ্ণ হয় এমন কিছু করিব না।</li>
                        </ol>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-5 py-2 fw-bold rounded-pill">জমা দিন</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-FornAppLayout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const memberType = document.getElementById('member_type');
        const image = document.getElementById('image');
        const socialFieldWrapper = document.getElementById('socialFieldWrapper');

        function toggleSocialField() {
            if (memberType.value === 'social') {
                socialFieldWrapper.classList.remove('d-none');
                image.classList.remove('col-md-6');
                image.classList.add('col-md-12');
            } else {
                socialFieldWrapper.classList.add('d-none');
            }
        }

        // Initial check (for old value after validation error)
        toggleSocialField();

        // On change
        memberType.addEventListener('change', toggleSocialField);
    });
</script>
