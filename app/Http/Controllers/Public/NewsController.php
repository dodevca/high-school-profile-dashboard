<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search                = $request->query('search');
        $sort                  = $request->query('sort', 'created_at|desc');
        [$sortField, $sortDir] = array_pad(explode('|', $sort), 2, 'desc');
        $query                 = News::query();

        if($search)
            $query->where(function($q) use($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });

        $query->orderBy($sortField, $sortDir);

        $news = $query->paginate(9)
            ->withQueryString()
            ->through(function ($n) {
                $n->created_at_formatted = $n->created_at->translatedFormat('d F Y');
                $n->date_human           = $n->created_at->diffForHumans();
                $n->content              = Str::limit(strip_tags($n->content), 150, ' ...');

                return $n;
            });

        $sortOptions = [
            'created_at|desc' => 'Terbaru',
            'created_at|asc'  => 'Terlama',
        ];

        return view('public.news', compact(
            'news',
            'search',
            'sort',
            'sortOptions'
        ));
    }

    public function view($id, $slug)
    {
        $news        = News::findOrFail($id);
        $correctSlug = Str::slug($news->title);

        if($slug !== $correctSlug)
            return redirect()->route('news.view', [$id, $correctSlug]);

        $detail = (object) [
            'title'     => $news->title,
            'slug'      => $news->slug,
            'thumbnail' => $news->thumbnail,
            'date_iso'  => $news->created_at->format('Y-m-d'),
            'date_human'=> $news->created_at->translatedFormat('d F Y'),
            'content'   => $news->content,
        ];

        $recentNews = News::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get()
            ->map(function(News $n) {
                return (object) [
                    'id'        => $n->id,
                    'title'     => $n->title,
                    'date'      => $n->created_at->translatedFormat('d F Y'),
                    'thumbnail' => $n->thumbnail,
                    'slug'      => $n->slug,
                ];
            });

        return view('public.news-detail', [
            'news'        => $detail,
            'recentNews' => $recentNews,
        ]);
    }
}
