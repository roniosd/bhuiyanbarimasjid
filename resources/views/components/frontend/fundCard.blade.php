@props(['fund'])
<div class="card col-lg-4 col-md-6 col-sm-12  mt-md-5 col-12">
    <img src="{{ asset('/public/storage/' . ($fund->featured_photo ? 'fund/' . $fund->featured_photo : 'default/category.png')) }}"
        alt="{{$fund->title}}" />
    <h3><a href="{{route('fundDetails', $fund->slug)}}">{{$fund->shortText($fund->title, 20)}}</a></h3>
    <p>{{$fund->donation_info}}</p>
    <a href="{{route('fundDetails', $fund->slug)}}"><button class="donate-btn">দান করুন</button></a>
</div>