<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;
use Carbon\Carbon;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $search                = $request->query('search');
        $sort                  = $request->query('sort', 'created_at|desc');
        [$sortField, $sortDir] = array_pad(explode('|', $sort), 2, 'desc');
        $query                 = Gallery::withCount('gallery_image');

        if($search)
            $query->where('title', 'like', "%{$search}%");

        $query->orderBy($sortField, $sortDir);

        $albums = $query->paginate(9)
            ->withQueryString()
            ->through(function ($album) {
                $album->created_at_formatted = Carbon::parse($album->created_at)->translatedFormat('d F Y');
                $album->slug                 = Str::slug($album->title);
        
                return $album;
            });

        $sortOptions = [
            'created_at|desc' => 'Terbaru',
            'created_at|asc'  => 'Terlama',
            'title|asc'       => 'A-Z',
            'title|desc'      => 'Z-A',
        ];

        return view('public.gallery', compact(
            'albums',
            'search',
            'sort',
            'sortOptions'
        ));
    }

    public function view($id, $slug)
    {
        $album       = Gallery::with('gallery_image')->findOrFail($id);
        $correctSlug = Str::slug($album->title);

        if($slug !== $correctSlug)
            return redirect()->route('gallery.view', [$id, $correctSlug]);

        $albumData = [
            'id'                   => $album->id,
            'slug'                 => $correctSlug,
            'title'                => $album->title,
            'description'          => $album->description,
            'thumbnail'            => $album->thumbnail,
            'created_at_formatted' => Carbon::parse($album->created_at)->translatedFormat('d F Y'),
            'gallery_image'        => $album->gallery_image->map(function ($img) {
                return (object) [
                    'image' => $img->image,
                ];
            })->toArray(),
        ];

        return view('public.gallery-detail', [
            'album' => (object) $albumData,
        ]);
    }
}
