<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Information;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $information = Information::select(['hero', 'short_profile', 'youtube_url'])
            ->first();

        $news = News::latest()
            ->take(3)
            ->get()
            ->map(fn($item) => tap($item, function($n){
                $n->content              = Str::words(strip_tags($n->content), 10, '…');
                $n->created_at_formatted = $n->created_at->translatedFormat('d F Y');
            }));

        $announcements = Announcement::with('major')
            ->latest()
            ->take(3)
            ->get()
            ->map(fn($item) => tap($item, function($a){
                $a->slug                 = Str::slug($a->title);
                $a->created_at_formatted = $a->created_at->translatedFormat('d F Y');
            }));

        $events = Event::where('start_time', '>=', Carbon::now())
            ->orderBy('start_time', 'asc')
            ->take(4)
            ->get()
            ->map(fn($item) => tap($item, function($e){
                $dt                      = Carbon::parse($e->start_time);
                $e->slug                 = Str::slug($e->title);
                $e->start_time_formatted = $dt->format('H:i');
                $e->day                  = $dt->day;
                $e->month                = $dt->translatedFormat('F');
            }));

        $albums = Gallery::select('*')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at')
            ->take(6)
            ->get()
            ->map(fn($item) => tap($item, function($e){
                $e->slug = Str::slug($e->title);
            }));

        return view('public.home', compact(
            'information',
            'news',
            'announcements',
            'events',
            'albums'
        ));
    }
}
