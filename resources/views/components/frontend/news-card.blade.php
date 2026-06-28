@props(['data'])
<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card d-flex flex-md-row flex-lg-row flex-sm-column">
        <img src="{{ $data->photo ?? asset('/public/storage/default/category.png') }}" alt="Card Image" />
        <div class="card-body">
            <span class="time-date">{{$data->getDate($data->updated_at, 'd M Y')}}</span>
            <h5 class="card-title">{{$data->shortText($data->title, 50)}}</h5>
            <p class="card-text">{{$data->shortText($data->short_description, 100)}}</p>
            <a href="{{route('newsDetails', $data->slug)}}" class="read-more btn-4">বিস্তারিত &gt;&gt;</a>
        </div>
    </div>
</div>
