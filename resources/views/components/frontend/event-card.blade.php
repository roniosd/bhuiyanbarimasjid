@props(['event'])
<div class="position-relative card col-lg-4 col-md-4 col-sm-12 col-12">
    <img src="{{ $event->photo ?? asset('/public/storage/default/category.png') }}"
        alt="{{$event->title}}" />
    <div class="card_body position-absolute">
        <h3><a href="{{route('eventDetails', $event->slug)}}">{{$event->title}}</a>
        </h3>
        <p>
            {{$event->short_description}}
        </p>
        <a href="{{route('eventDetails', $event->slug)}}" class="btn-4">বিস্তারিত >></a>
    </div>
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
</div>
