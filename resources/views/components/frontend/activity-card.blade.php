@props(['activity'])
<div class="card col-lg-4 col-md-6 col-sm-12 col-6">
    <img src="{{ asset('/public/storage/' . ($activity->photo ? '\activity/' . $activity->photo : 'default/category.png')) }}"
        alt="{{$activity->title}}" />
    <h3>
        <a href="{{ route('activityDetails', $activity->slug) }}">
            {{ $activity->shortText($activity->title, 65) }}
        </a>
    </h3>
    <p>{{$activity->short_description}}
    </p>
    <a href="{{ route('activityDetails', $activity->slug) }}"
        class="btn-4">বিস্তারিত >></a>
</div>