<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Album;
use App\Models\Collector;
use App\Models\Event;
use App\Models\Fund;
use App\Models\Post;

class DetailsPageController extends Controller
{
  public function fund(string $slug)
  {
    $fund = Fund::where('slug', $slug)->first();
    return view('frontend.views.fundDetails', compact('fund'));
  }

  public function collector()
  {
    $collectors = Collector::with('donationBooks')->paginate(12);
    return view('frontend.views.collector', compact('collectors'));
  }

  public function activity(string $slug)
  {
    $activity = Activities::where('slug', $slug)->first();
    return view('frontend.views.activityDetails', compact('activity'));
  }

  public function event(string $slug)
  {
    $event = Event::where('slug', $slug)->first();
    return view('frontend.views.eventDetails', compact('event'));
  }


  public function news(string $slug)
  {
    $newsInfo = Post::where('slug', $slug)->first();
    return view('frontend.views.newsDetails', compact('newsInfo'));
  }
  public function photoGallary(string $slug)
  {
    $photos = Album::where('slug', $slug)->first();

    return view('frontend.views.photoGallary', compact('photos'));
  }

}
