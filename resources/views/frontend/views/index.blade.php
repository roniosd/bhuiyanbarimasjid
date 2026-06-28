@php
    $sections = json_decode($homepageSetting->sections, true);
@endphp
<x-FornAppLayout :$setting>
    <main>
        <section class="position-relative" style="overflow: visible">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($sliders as $slider)
                        <div class="swiper-slide ">
                            <img class="img-fluid" src="{{ $slider->photo ?? asset('/public/storage/default/category.png') }}"
                                alt="slider-{{ $slider->position }}" />
                        </div>
                    @empty
                        <div class="swiper-slide hero_img"style="height: 200px">
                           
                        </div>
                    @endforelse
                </div>
            </div>

            <section class="hero-section  {{ $sections['অনুদান তহবিল'] ? '' : 'd-none' }}">
                <div class="hero position-relative">
                    <div class="hero-box container-lg px-4 py-5 shadow" style="bottom: -6rem; ">
                        <form action="{{ url('/donation') }}" method="POST" class="row needs-validation">
                            @csrf

                            <div class="col-lg-3 col-12">
                                <select name="fund_id" class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">অনুদান তহবিল</option>
                                    @forelse ($fundlist as $fund)
                                        <option value="{{ $fund->id }}">{{ $fund->title }}</option>
                                    @empty
                                        <option disabled>There are no Funds</option>
                                    @endforelse
                                </select>
                            </div>

                            <input type="hidden" name="doner" value="" id="">

                            <div class="col-lg-3  col-12">
                                <input name="contact" type="text" class="form-control" id="validationCustom05" required
                                    placeholder="মোবাইল / ইমেইল" />
                            </div>

                            <div class="col-lg-3  col-12">
                                <input name="amount" type="number" class="form-control" id="validationCustom06" required
                                    min="1000" placeholder="অনুদানের পরিমাণ" />
                            </div>

                            <div class="col-lg-3  col-12">
                                <button type="submit" class="btn btn-1 btns">দান করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>


        <section
            class="about_section container py-5 position-relative {{ $sections['আমাদের সম্পর্কে'] ? '' : 'd-none' }}">

            <div class="row">
                <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                    <img class="img-fluid"
                        src="{{ $aboutUs->photo ?? asset('/public/storage/default/category.png') }}"
                        alt="{{$aboutUs->title}}" />
                </div>
                <div class="deteails col-12 col-md-6 col-sm-12 col-lg-5 mt-5 mt-lg-0 mt-md-0">
                    <h1>{{ $aboutUs->title }}</h1>
                    <div>
                        {!! $aboutUs->shortText($aboutUs->description, 500) !!}
                    </div>
                    <a href="{{$aboutUs->slug}}" class="btn btn-outline-success pt-2 btn-3 mt-lg-4 mt-md-1">
                        বিস্তারিত জানুন
                    </a>
                </div>
            </div>

            <img style="top: 100%; height: 73%" class="flower position-absolute"
                src="{{ asset('/public/storage/default/left-design.png') }}" alt="Left" />
            <img style="right: 0; top: 96%; height: 66%" class="flower position-absolute"
                src="{{ asset('/public/storage/default/right-design.png') }}" alt="Right" />
        </section>



        <section class="donation-section {{ $sections['অনুদান তহবিল'] ? '' : 'd-none' }}">
            <div class="container">
                <div class="text-center header pt-5">
                    <h1>অনুদান তহবিল</h1>
                </div>
                <div class="row gap-3 m-auto">
                    @forelse ($funds->take(6) as $fund)
                        <x-frontend.fundCard :$fund />
                    @empty
                        <h1>There are no Funds </h1>
                    @endforelse
                    <h1 class="mt-5"></h1>
                </div>
            </div>
        </section>



        <section class="activity_section {{ $sections['কার্যক্রম সমূহ'] ? '' : 'd-none' }}">
            <div class="container">
                <div class="container">
                    <div class="row custom-header my-5">
                        <div class="col-7 text-end text-sm-left">
                            <span>কার্যক্রম সমূহ</span>
                        </div>
                        <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                            <a href="{{ route('seemore.type', 'activity') }}" class="btn-5">আরো দেখুন</a>

                        </div>
                    </div>
                </div>

                <div class="row gap-4 m-auto">
                    @forelse ($activities->take(3) as $activity)
                        <x-frontend.activity-card :$activity />
                    @empty
                        <h1>There are no Acivity Cards.. </h1>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="container banner position-relative {{ $sections['ব্যানার'] ? '' : 'd-none' }}">
            <img src="{{ $homepageSetting->photo ?? asset('/public/storage/default/category.png') }}"
                class="img-fluid ms-lg-3" alt="" />

            <div class="position-absolute banner_text">
                <h4>{{ $homepageSetting->title }}</h4>
                <p style="margin-left: 22px;">{{ $homepageSetting->short_descreption }}</p>
            </div>

            <a target="_blank" href="{{ url($homepageSetting->btn_link) }}">
                <button type="button" class="btn btn-light position-absolute btn-1">
                    {{ $homepageSetting->btn_label }}
                </button>
            </a>
        </section>


        <section class="activity_section ocation-section {{ $sections['অনুষ্ঠানসমূহ'] ? '' : 'd-none' }}">
            <div class="container">
                <div class="container">
                    <div class="row custom-header my-5">
                        <div class="col-7 text-end text-sm-left">
                            <span>অনুষ্ঠানসমূহ</span>
                        </div>
                        <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                            <a href="{{ route('seemore.type', 'event') }}" class="btn-5">আরো দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="row gap-4 m-auto">
                    @forelse ($events->take(3) as $event)
                        <x-frontend.event-card :$event />
                    @empty
                        <h1>There are no Ocation Cards.. </h1>
                    @endforelse
                </div>
            </div>
        </section>


        <section class="img_gallary {{ $sections['গ্যালারী'] ? '' : 'd-none' }}">
            <div class="container">
                <div class="row custom-header my-5">
                    <div class="col-7 text-end text-sm-left">
                        <span>গ্যালারী</span>
                    </div>
                    <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                        <a href="{{ route('seemore.type', 'gallery') }}" class="btn-5">আরো দেখুন</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="masonry">
                    @forelse ($albums->take(6) as $index => $album)
                        <a href="{{ route('photoGallary', $album->slug) }}" class="item item{{ $index + 1 }}">
                            <img src="{{ $album->cover ?? asset('/public/storage/default/category.png') }}"
                                class="img-fluid" alt="{{ $album->album_name }}" />
                            <h1 class="pt-2">{{ $album->shortText($album->album_name, 25) }}</h1>
                        </a>
                    @empty
                        <h1>There are no Albums.. </h1>
                    @endforelse

                </div>
            </div>
        </section>

        <section class="news_section py-5 {{ $sections['সর্বশেষ খবর'] ? '' : 'd-none' }}">
            <div class="container">
                <div class="row custom-header my-5">
                    <div class="col-7 text-end text-sm-left">
                        <span>সর্বশেষ খবর</span>
                    </div>
                    <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                        <a href="{{ route('seemore.type', 'news') }}" class="btn-5">আরো দেখুন</a>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row g-4">
                    @forelse ($news->take(2) as $data)
                        <x-frontend.news-card :$data />
                    @empty
                        <h1>There are no News Cards.. </h1>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="contact_section py-5">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-sm-12 col-md-12 col-lg-6">
                        <img src="{{ asset('/public/storage/default/contact.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col main-body col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="col col-12 col-sm-12 col-md-12 col-lg-6 m-md-auto"></div>
                        <h1>নতুন এবং আসন্ন সকল তথ্য পেতে নিবন্ধন করুন</h1>
                        <p>
                            সম্মানীত পাঠক, আমাদের সকল কার্যক্রম সম্পর্কে আপনাদেরকে নিয়মিত
                            জানানোর জন্য আমরা খুব শীঘ্রই নিউজলেটার তৈরী করতে যাচ্ছি। নিবন্ধন
                            করে আমাদের সাথেই থাকুন। ধন্যবাদ
                        </p>

                        <form action="subscribe" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="name" class="form-control" id="inputEmail4"
                                        placeholder="আপনার নাম" />
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="email" id="inputPassword4"
                                        placeholder="ইমেইল" />
                                </div>
                                <div class="col-12">
                                    <button class="form-control mt-3 btn-1 btn-sub">
                                        সাবস্ক্রাইব করুন
                                    </button>
                                </div>
                            </div>
                            <div class="cheakBox mt-4 d-flex align-items-center">
                                <input value="yes" type="checkbox" name="agreed" id="cheakBox" />
                                <label for="cheakBox">I agree with <span>Terms & Condition</span></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-FornAppLayout>
