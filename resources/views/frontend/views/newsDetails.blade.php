<x-FornAppLayout>
    <section style="background: #E5F9ED;" class="about_box_section ocation-datials-sec activity-box-sec py-5">
        <div class="container">
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12 border-0">
                    <h1>
                        {{$newsInfo->title}}
                    </h1>
                    <h5>{{$newsInfo->getBangla($newsInfo->getDate($newsInfo->updated_at, 'l | d M Y '))}}</h5>

                    <img style="object-fit: cover"  src="{{ asset('/public/storage/' . ($newsInfo->photo ? 'post/' . $newsInfo->photo : 'default/category.png')) }}" alt="News information" />

                    <p>{!!$newsInfo->description!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="news_section pt-3" style="background: #E5F9ED;">
        <div class="container">
            <div class="row custom-header">
                <div class="col-7 text-end text-sm-left">
                    <span>সংবাদ</span>
                </div>
                <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                    <a href="{{ route('seemore.type', 'news') }}">আরো দেখুন</a>
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
</x-FornAppLayout>