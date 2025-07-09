<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Announcement;
use App\Models\Major;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $search                = $request->input('search', '');
        $majorId               = $request->input('major_id', '');
        $sort                  = $request->input('sort', 'created_at|desc');
        [$sortField, $sortDir] = explode('|', $sort);
        $query                 = Announcement::with('major');
        $filterOptions         = Major::pluck('name', 'id')
            ->prepend('Semua', '');

        if($search)
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");

        if($majorId)
            $query->where('major_id', $majorId);

        $query->orderBy($sortField, $sortDir);

        $announcements = $query
            ->paginate(9)
            ->withQueryString();

        $announcements->getCollection()->transform(function ($a) {
            return (object) [
                'id'                    => $a->id,
                'title'                 => $a->title,
                'slug'                  => Str::slug($a->title),
                'content'               => Str::limit(strip_tags($a->content), 150, '...'),
                'created_at_formatted'  => $a->created_at->translatedFormat('d F Y'),
                'major_code'            => $a->major ? $a->major->code : null,
            ];
        });

        $sortOptions = [
            'created_at|desc' => 'Terbaru',
            'created_at|asc'  => 'Terlama',
        ];

        return view('public.announcement', compact(
            'announcements',
            'search',
            'majorId',
            'sort',
            'sortOptions',
            'filterOptions'
        ));
    }

    public function view($id, $slug)
    {
        $a           = Announcement::with('major')->findOrFail($id);
        $correctSlug = Str::slug($a->title);

        if($slug !== $correctSlug)
            return redirect()->route('announcement.view', [$id, $correctSlug]);

        $announcement = (object) [
            'id'                   => $a->id,
            'title'                => $a->title,
            'content'              => $a->content,
            'major_code'           => $a->major?->code ?? null,
            'created_at_formatted' => Carbon::parse($a->created_at)->translatedFormat('d F Y'),
            'time_elapsed'         => Carbon::parse($a->created_at)->diffForHumans(),
            'image'                => $a->image,
        ];

        return view('public.announcement-detail', compact('announcement'));
    }
}
