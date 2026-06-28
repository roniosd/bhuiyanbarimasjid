<x-FornAppLayout :$pageDetails>
    <section class="top_header text-center">
        <p>{{$pageDetails->title}}</p>
    </section>

    <section style="background: #e5f9ed" class="contact-us">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card p-4 border-0">
                        <h2 class="text-left mb-4">যোগাযোগ করুন</h2>
                        <form class="card-body" method="POST" action="{{ url('storeFeedback') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"><span>*</span>আপনার নাম</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><span>*</span>আপনার ইমেইল</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label"><span>*</span>আপনার বিষয়</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ old('subject') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label"><span>*</span>আপনার বার্তা</label>
                                <textarea class="form-control" id="message" name="message" rows="5" style="resize: none"
                                    required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn w-100 mt-3 contact_btn">
                                বার্তা পাঠান
                            </button>
                        </form>

                    </div>
                </div>

                <div class="col-md-12 col-lg-6 contact-map">
                    <div class="card p-4 pt-2 border-0 mb-3 {{$contact->map ?? 'd-none'}}">
                        <div class="card-body">
                            <h5 class="card-title mb-5">আমাদের ঠিকানা?</h5>
                                <iframe width="100%" height="450" style="border:0;" src="{{ $contact->map ?? "" }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-label="Google Map Location"></iframe>
                        </div>
                    </div>

                    <div class="card p-4 border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">বিস্তারিত ঠিকানা</h5>
                            <p class="card-text mb-2">
                                <strong>ঠিকানাঃ</strong><br />
                                {{$contact->address ??""}}
                            </p>
                            <p class="card-text mb-2">
                                <strong>মোবাইলঃ</strong><br />
                                {{$contact->mobile  ??""}}
                            </p>
                            <p class="card-text mb-2">
                                <strong>টেলিফোনঃ</strong><br />
                                {{ $contact->tnt  ??""}}
                            </p>
                            <p class="card-text">
                                <strong>ইমেইলঃ</strong><br />
                                {{$contact->email  ??""}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-FornAppLayout>