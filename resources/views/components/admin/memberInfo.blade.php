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
        background-image: url('{{ asset('public/storage/default/memberbg.jpg') }}');
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
    }

    .declaration ol {
        padding-left: 20px;
        margin: 0;
        list-style: none
    }

    .declaration li {
        margin-bottom: 8px;
        text-align: justify;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: -10px;
    }

    .sign-box {
        border-top: 1px solid #000;
        width: 30%;
        padding-top: 6px;
        text-align: center;
        font-size: 11pt;
    }

    .sign-row {
        display: flex;
        align-items: center;
        margin-top: 8px;
        gap: 5px;
        flex-wrap: wrap;
    }

    .line {
        flex: 1;
        border-bottom: 1px solid #000;
        height: 0;
    }

    .line.short {
        flex: 0 0 150px;
        /* Shorter line for signature */
    }

    .line.long {
        flex: 1;
        /* Longer for committee */
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

        {{-- Header --}}
        <div class="section" style="">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <p><strong>ফর্ম নং:</strong> {{ str_pad($member->id, 4, '0', STR_PAD_LEFT) }}</p>
                <p><strong>ইউনিট নং:</strong> {{ $member->unit_no ?? 'N/A' }}</p>

                <div
                    style="width: 110px; height: 130px; display: flex; align-items: center; justify-content: ceneter; ">
                    <img style="margin-top: 90px"
                        src="{{ $member->photo ?? asset('/public/storage/default/category.png') }}"
                        alt="Member Photo" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>

        {{-- Membership Type --}}
        <div class="itemrow section" style="margin-top: -50px">
            <p><strong>সদস্য ধরণ:</strong>
                {{ $member->member_type == 'donor' ? 'দাতা সদস্য' : ($member->member_type == 'lifetime' ? 'আজীবন সদস্য' : 'সাধারণ সদস্য') }}
            </p>
            <p><strong>তারিখ:</strong>
                {{ $member->created_at ? $member->created_at->format('d/m/Y') : now()->format('d/m/Y') }}</p>
        </div>

        {{-- Basic Info --}}
        <div class="itemrow section">
            <p><strong>নাম:</strong> {{ $member->full_name ?? 'N/A' }}</p>
             <p><strong>জন্ম তারিখ:</strong> {{ $member->dob ?? 'N/A' }}</p>
            <p><strong>পিতা:</strong> {{ $member->father ?? 'N/A' }}</p>
            <p><strong>মাতা:</strong> {{ $member->mother ?? 'N/A' }}</p>
            <p><strong>পেশা:</strong> {{ $member->occupation ?? 'N/A' }}</p>
            <p><strong>মোবাইল:</strong> {{ $member->mobile ?? 'N/A' }}</p>
        </div>

        {{-- Present Address --}}
        <div class="itemrow section">
            <p><strong>বর্তমান ঠিকানা:</strong></p>
            <p><strong>গ্রাম:</strong> {{ $member->presentAddress->village ?? '' }}</p>
            <p><strong>ওয়ার্ড/ইউনিয়ন:</strong> {{ $member->presentAddress->post ?? '' }}</p>
            <p><strong>উপজেলা:</strong> {{ $member->presentAddress->subdistrict ?? '' }}</p>
            <p><strong>জেলা:</strong> {{ $member->presentAddress->district ?? '' }}</p>
        </div>

        {{-- Permanent Address --}}
        <div class="itemrow section">
            <p><strong>স্থায়ী ঠিকানা:</strong></p>
            <p><strong>গ্রাম:</strong> {{ $member->permanentAddress->village ?? '' }}</p>
            <p><strong>ওয়ার্ড/ইউনিয়ন:</strong> {{ $member->permanentAddress->post ?? '' }}</p>
            <p><strong>উপজেলা:</strong> {{ $member->permanentAddress->subdistrict ?? '' }}</p>
            <p><strong>জেলা:</strong> {{ $member->permanentAddress->district ?? '' }}</p>
        </div>


   


    </div>
</section>
