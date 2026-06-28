<style>
    @page {
        size: A4;
        margin: 10mm;
    }


    .mainsection {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
        font-family: 'Siyam Rupali', 'SolaimanLipi', Arial, sans-serif;
        font-size: 12px;
        background-image: url('{{ asset('public/storage/default/Studentbg.jpg') }}');
        background-size: 210mm 297mm;
        background-position: center;
        background-repeat: no-repeat;
        color: #000;
    }

    .container {
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
        padding: 10px;
        box-sizing: border-box;
    }

    .section {
        margin-bottom: 12px;
    }

    .itemrow {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .itemrow p {
        flex: 1 1 48%;
        margin: 0 0 3px;
    }

    .block {
        border: 1px solid #333;
        padding: 8px;
        margin-top: 10px;
    }

    img {
        width: 100%;
        height: auto;
        display: block;
    }

    .header-img {
        max-height: 110px;
        margin-bottom: 10px;
    }

    .declaration {
        padding: 10px 15px;
        border: 1px solid #333;
        font-size: 11pt;
        margin: 15px 0;
        border-radius: 5px;
    }

    .declaration h5 {
        text-align: center;
        color: #d9534f;
        margin: 5px 0 10px 0;
        font-size: 13pt;
        text-decoration: underline;
    }

    .declaration ol {
        padding-left: 20px;
        margin: 0;
    }

    .declaration li {
        margin-bottom: 8px;
        text-align: justify;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 60px;
    }

    .sign-box {
        border-top: 1px solid #000;
        width: 30%;
        padding-top: 6px;
        text-align: center;
        font-size: 11pt;
    }

    .attachment {
        flex-gitemrow: 1;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: #0066cc;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            background-size: cover;
        }
    }
</style>

<section class="mainsection">
    <div class="container">

        {{-- Header Image --}}
        <div class="section" style="position: relative; margin-top: 150px;">
            <img src="{{ $student->image ?? asset('/public/storage/default/category.png') }}"
                alt="Profile"
                style="position: absolute; top: 0; right: 10px; width: 130px; height: 140px; object-fit: cover; border: 1px solid #000;">
        </div>

        {{-- Basic Info --}}
        <div class="section" style="display: flex;justify-content: space-between; width: 70%;">
            <p><strong>ফর্ম নং:</strong> {{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</p>
            <p><strong>শিক্ষাবর্ষ:</strong> {{ $student->session ?? '২০২৫' }}</p>
            <p><strong>তারিখ:</strong> {{ now()->format('d/m/Y') }}</p>
        </div>

        {{-- Student Info --}}
        <div class="itemrow section" style="margin-top: 10px;">
            <p><strong>নাম (বাংলায়):</strong> {{ $student->name_bn ?? 'N/A' }}</p>
            <p><strong>নাম (ইংরেজিতে):</strong> {{ $student->name_en ?? 'N/A' }}</p>
            <p><strong>পিতা:</strong> {{ $student->father_name ?? 'N/A' }}</p>
            <p><strong>মাতা:</strong> {{ $student->mother_name ?? 'N/A' }}</p>
            <p><strong>জন্ম তারিখ:</strong> {{ $student->dob ?? 'N/A' }}</p>
            <p><strong>রক্তের গ্রুপ:</strong> {{ $student->blood_group ?? 'N/A' }}</p>
            <p><strong>জন্ম নিবন্ধন নম্বর:</strong> {{ $student->birth_reg_no ?? 'N/A' }}</p>
            <p><strong>জাতীয়তা:</strong> {{ $student->nationality ?? 'N/A' }}</p>
            <p><strong>ইমেইল:</strong> {{ $student->email ?? 'N/A' }}</p>
            <p><strong>মোবাইল:</strong> {{ $student->mobile ?? 'N/A' }}</p>
            <p><strong>অভিভাবক:</strong> {{ $student->guardian_name ?? 'N/A'  }}</p>
            <p><strong>পূর্ববর্তী মাদ্রাসা:</strong> {{ $student->previous_school ?? 'N/A' }}</p>
            <p><strong>পূর্ববর্তী ক্লাস:</strong> {{ $student->previous_class ?? 'N/A' }}</p>
            <p><strong>নতুন শিক্ষার্থীর রেজাল্ট:</strong> {{ $student->new_result ?? 'N/A' }}</p>
            <p><strong>ক্লাস:</strong> {{ $student->class ?? 'N/A'  }}</p>
            <p><strong>ভর্তির ধরন:</strong> {{ $student->admission_type ?? 'N/A'  }}</p>
        </div>

        {{-- Present Address --}}
        <div class="itemrow section">
            <p><strong>বর্তমান গ্রাম:</strong> {{ $student->presentAddress->village ?? 'N/A' }}</p>
            <p><strong>বর্তমান ডাকঘর:</strong> {{ $student->presentAddress->post ?? 'N/A'  }}</p>
            <p><strong>বর্তমান থানা:</strong> {{ $student->presentAddress->subdistrict ?? 'N/A' }}</p>
            <p><strong>বর্তমান জেলা:</strong> {{ $student->presentAddress->district ?? 'N/A' }}</p>
        </div>

        {{-- Permanent Address --}}
        <div class="itemrow section">
            <p><strong>স্থায়ী গ্রাম:</strong> {{ $student->permanentAddress->village ?? 'N/A'  }}</p>
            <p><strong>স্থায়ী ডাকঘর:</strong> {{ $student->permanentAddress->post ?? 'N/A' }}</p>
            <p><strong>স্থায়ী থানা:</strong> {{ $student->permanentAddress->subdistrict ?? 'N/A'  }}</p>
            <p><strong>স্থায়ী জেলা:</strong> {{ $student->permanentAddress->district ?? 'N/A'  }}</p>
        </div>

        {{-- Declaration --}}
        <div class="declaration">
            <h5>অঙ্গীকার পত্র</h5>
            <ol>
                <li>আমি স্বীকার করছি যে, আমার ছেলে/মেয়ে সর্ববিষয়ে কুরআন সুন্নাহ মোতাবেক শিক্ষা গ্রহণ করিতে বাধ্য
                    থাকিবে।</li>
                <li>মাদ্রাসার কোনো নিয়ম ভঙ্গ করিলে কর্তৃপক্ষ যে সিদ্ধান্ত নিবে আমি তা মেনে নিব।</li>
                <li>মাদ্রাসায় নির্ধারিত ইউনিফর্ম পরিধান বাধ্যতামূলক।</li>
                <li>পড়ালেখা চলাকালীন কোন কোচিং/প্রাইভেট এ অংশগ্রহণ করতে পারবে না।</li>
                <li>মাদ্রাসা পরিবর্তন করতে চাইলে এক মাস আগে আবেদন করতে হবে।</li>
                <li>আমি/আমার ছেলে/মেয়ে কোনো সরকারি সাহায্য পেলে তার কপি জমা দিব।</li>
            </ol>
        </div>

        {{-- Signatures --}}
        <div class="signatures">
            <div class="sign-box">ছাত্র/ছাত্রীর স্বাক্ষর<br>তারিখ: ______________</div>
            <div class="attachment">সংযুক্তিঃ <br>১। জন্ম নিবন্ধনের ফটোকপি<br>২। পিতা/মাতার জন্ম নিবন্ধন বা এন.আই.ডি
                কার্ডের ফটোকপি<br>৩। ২ কপি পাসপোর্ট সাইজ ছবি</div>
            <div class="sign-box">অভিভাবকের স্বাক্ষর<br>তারিখ: ______________</div>
        </div>

    </div>
</section>
