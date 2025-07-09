<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $search                = $request->query('search');
        $sort                  = $request->query('sort', 'start_time|asc');
        $type                  = $request->query('type');
        $page                  = (int) $request->query('page', 1);
        $perPage               = (int) $request->query('perPage', 8);
        [$sortField, $sortDir] = explode('|', $sort) + [1 => 'asc'];
        $query                 = Event::query();

        if($search)
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        if($type)
            $query->where('type', $type);

        $query->orderBy($sortField, $sortDir);

        $events = $query
            ->paginate(12)
            ->withQueryString();

        $events->getCollection()->transform(function ($e) {
            $dt = Carbon::parse($e->start_time);

            return (object) [
                'id'                   => $e->id,
                'title'                => $e->title,
                'type'                 => $e->type,
                'slug'                 => Str::slug($e->title),
                'description'          => strlen(strip_tags($e->description)) > 50 ? substr(strip_tags($e->description), 0, 50) . '...' : strip_tags($e->description),
                'day'                  => $dt->day,
                'month'                => $dt->translatedFormat('F'),
                'start_time_formatted' => $dt->format('H:i'),
            ];
        });

        $filterOptions = [
            ''         => 'Semua Tipe',
            'Internal' => 'Internal',
            'External' => 'Eksternal',
        ];

        $sortOptions = [
            'start_time|asc'  => 'Mendatang',
            'created_at|asc' => 'Terbaru',
            'created_at|desc' => 'Terlama',
        ];

        return view('public.event', compact(
            'events',
            'search',
            'sort',
            'type',
            'filterOptions',
            'sortOptions'
        ));
    }

    public function view($id, $slug)
    {
        $e           = Event::findOrFail($id);
        $correctSlug = Str::slug($e->title);

        if($slug !== $correctSlug)
            return redirect()->route('announcement.view', [$id, $correctSlug]);

        $event = (object) [
            'title'       => $e->title,
            'type'        => $e->type,
            'date'        => $e->created_at->translatedFormat('d F Y'),
            'date_start'  => Carbon::parse($e->start_time)->translatedFormat('d F Y'),
            'time_start'  => Carbon::parse($e->start_time)->format('H:i'),
            'date_end'    => Carbon::parse($e->end_time)->translatedFormat('d F Y'),
            'time_end'    => Carbon::parse($e->end_time)->format('H:i'),
            'description' => $e->description,
            'image'       => $e->image,
        ];

        return view('public.event-detail', compact('event'));
    }

}
