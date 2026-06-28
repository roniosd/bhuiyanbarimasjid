<x-FornAppLayout>
    <section style="background: #E5F9ED;" class="about_box_section ocation-datials-sec activity-box-sec py-5">
        <div class="container">
            <div class="row">
                <div class="card col-lg-12 col-md-12 col-sm-12 col-12 border-0">
                    <h1>{{$event->title}}</h1>
                    <h5>
                        {{$event->getBangla($event->getDate($event->start_date, 'd M Y'))}} । {{$event->venue}}
                    </h5>
                    <img  class="position-relative ocation-datials-img"
                        src="{{ asset('/public/storage/' . ($event->photo ? 'event/' . $event->photo : 'default/category.png')) }}"
                        alt="" />

                    <div class="date position-absolute text-center">
                        <h6>
                            <span>
                                {{$event->getDate($event->start_date, 'd')}}
                            </span>
                            <br />
                            {{$event->getDate($event->start_date, 'M')}}
                            <br />
                            {{$event->getDate($event->start_date, 'Y')}}
                        </h6>
                    </div>
                    <p>
                        {!!$event->description!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #E5F9ED;" class="activity_section ocation-section">
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
</x-FornAppLayout>