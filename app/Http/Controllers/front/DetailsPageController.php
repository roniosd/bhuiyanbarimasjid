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
    $activities = Activities::where('status', 'published')
      ->latest('updated_at')
      ->paginate(9);
    $activity = Activities::where('slug', $slug)->first();
    return view('frontend.views.activityDetails', compact('activity','activities'));
  }

  public function event(string $slug)
  {
    $events = Event::where('status', 'published')
      ->paginate(6);
    $event = Event::where('slug', $slug)->first();
    return view('frontend.views.eventDetails', compact('event', 'events'));
  }


  public function news(string $slug)
  {
    $news = Post::where(
      'status',
      'published'
    )->whereIn('type', ['news', 'post'])
      ->latest('updated_at')
      ->paginate(6);
    $newsInfo = Post::where('slug', $slug)->first();
    return view('frontend.views.newsDetails', compact('newsInfo', 'news'));
  }
  public function photoGallary(string $slug)
  {
    $photos = Album::where('slug', $slug)->first();

    return view('frontend.views.photoGallary', compact('photos'));
  }

}
