<?php

namespace App\Http\Controllers\front;

use App\FileHandlerTrait;
use App\Models\Fund;
use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Album;
use App\Models\Collector;
use App\Models\Committee;
use App\Models\Event;
use App\Models\HomepageSetting;
use App\Models\Member;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class FrontPageController extends Controller
{
   use FileHandlerTrait;


   private function getYoutubeVideos()
   {
      $channelId = env('YOUTUBE_CHANNEL_ID');
      $apiKey = env('YOUTUBE_API_KEY');
      $videos = [];
      $pageToken = null;

      do {
         $apiUrl = 'https://www.googleapis.com/youtube/v3/search';

         $response = Http::get($apiUrl, [
            'key' => $apiKey,
            'channelId' => $channelId,
            'part' => 'snippet,id',
            'order' => 'date',
            'maxResults' => 50,
            'pageToken' => $pageToken
         ]);

         if (!$response->successful())
            break;

         $data = $response->json();

         foreach ($data['items'] as $item) {
            if (isset($item['id']['videoId'])) {
               $videoId = $item['id']['videoId'];
               $snippet = $item['snippet'];

               $videos[] = [
                  'title' => $snippet['title'],
                  'videoId' => $videoId,
                  'published' => Carbon::parse($snippet['publishedAt'])->timezone('Asia/Dhaka'),
                  'thumbnail' => $snippet['thumbnails']['medium']['url'],
               ];
            }
         }

         $pageToken = $data['nextPageToken'] ?? null;

      } while ($pageToken);

      return $videos;
   }

   public function index()
   {
      $funds = Fund::where('status', 'active')
         ->paginate(6);

      $events = Event::where('status', 'published')
         ->paginate(6);

      $homepageSetting = HomepageSetting::first();


      $activities = Activities::where('status', 'published')
         ->latest('updated_at')
         ->paginate(9);

      $news = Post::where(
         'status',
         'published'
      )->whereIn('type', ['news', 'post'])
         ->latest('updated_at')
         ->paginate(6);

      $albums = Album::where('status', 'published')
         ->latest('updated_at')
         ->paginate(6);

      $fundlist = Fund::where('status', 'active')->get();

      $sliders = Slider::where('status', 'published')
         ->orderBy('position')
         ->get();

      $aboutUs = Page::where('status', 'published')
         ->where('template', 'about')
         ->first();

      return view('frontend.views.index', compact(
         'sliders',
         'fundlist',
         'aboutUs',
         'funds',
         'activities',
         'news',
         'albums',
         'events',
         'homepageSetting'
      ));
   }

   // ! Display All Pages..................
   public function show($slug)
   {
      $pageDetails = Page::where('slug', $slug)
         ->where('status', 'published')
         ->firstOrFail();

      $funds = Fund::where('status', 'active')
         ->paginate(6);

      $events = Event::where('status', 'published')
         ->paginate(6);




      $fundlist = Fund::where('status', 'active')->get();
      $activities = Activities::where('status', 'published')
         ->latest('updated_at')
         ->paginate(9);

      $news = Post::where(
         'status',
         'published'
      )->whereIn('type', ['news', 'post'])
         ->latest('updated_at')
         ->paginate(6);

      $albums = Album::where('status', 'published')
         ->latest('updated_at')
         ->paginate(6);

      $events = Event::where('status', 'published')
         ->paginate(6);

      $template = $pageDetails->template ?? 'default';
      $collectors = Collector::latest()->paginate(9);
      $committees = [];
      $videos = [];
      $members = [];

      if ($template === 'youtubeVideo') {
         $videos = $this->getYoutubeVideos();
      }
      if ($template === 'member') {
         $members = Member::where('member_type', $pageDetails->type)
            ->latest()
            ->paginate(9);
      }
      if ($template === 'committee') {
         $committees = Committee::where(['status' => 'published', 'type' => $pageDetails->type])
            ->oldest()->get();
      }


      if (view()->exists("frontend/views/templates.$template")) {
         return view("frontend/views/templates.$template", compact(
            'pageDetails',
            'videos',
            'template',
            'members',
            'events',
            'fundlist',
            'albums',
            'funds',
            'activities',
            'news',
            'collectors',
            'committees',
         ));
      } else {
         return view("frontend/views/templates/default", compact('pageDetails'));
      }
   }



   public function member()
   {
      return view('frontend.views.member');
   }

   public function admission()
   {
      $lastId = Student::latest('id')->value('id');
      $formNo = str_pad(($lastId ? $lastId + 1 : 1), 4, '0', STR_PAD_LEFT);
      return view('frontend.views.admissionForm', compact('formNo'));
   }

}
