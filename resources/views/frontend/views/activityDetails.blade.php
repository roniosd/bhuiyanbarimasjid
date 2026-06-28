<x-FornAppLayout>
    <section style="background: #E5F9ED;" class="about_box_section activity-box-sec py-5">
        <div class="container">
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12 border-0">
                    <h1>{{$activity->title}}
                    </h1>
                    <h5>{{$activity->getDate($activity->created_at, 'd F Y')}}</h5>
                    <img class="about_as_img"
                        src="{{ $activity->photo ?? asset('/public/storage/default/category.png') }}"
                        alt="" />
                    <p>{!!$activity->description!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #E5F9ED;" class="activity_section activity_section-2 py-5">
        <div class="container">
            <div class="container">
                <div class="row custom-header pb-4">
                    <div class="col-7 text-end text-sm-left">
                        <span>কার্যক্রম সমূহ</span>
                    </div>
                    <div class="col-5 see-more text-end pt-lg-3 pt-md-3">
                        <a href="{{ route('seemore.type', 'activity') }}">আরো দেখুন</a>
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
</x-FornAppLayout>
