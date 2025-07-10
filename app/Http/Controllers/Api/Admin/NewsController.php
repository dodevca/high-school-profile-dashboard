<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort                        = $request->input('sort', 'created_at|desc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        $search                      = $request->input('search');
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'desc'];
        $query                       = News::query();

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );
        
        $paginated->getCollection()->transform(function($item) {
            return [
                'id'         => $item->id,
                'title'      => $item->title,
                'slug'       => $item->slug,
                'thumbnail'  => $item->thumbnail,
                'active'     => (bool) $item->active,
                'created_at' => $item->created_at ? $item->created_at->format('d-m-Y') : null,
            ];
        });

        return response()->json($paginated);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title'     => 'required|string|max:255',
                'content'   => 'required|string',
                'thumbnail' => 'nullable|image|max:2048',
            ]);

            $data['slug']    = Str::slug($data['title']);
            $allowed         = '<p><a><strong><em><ul><ol><li><br>';
            $data['content'] = strip_tags($data['content'], $allowed);
            $data['content'] = preg_replace('#(<[^>]+?)on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)#i', '$1', $data['content']);
            $data['active']  = true;

            if($request->hasFile('thumbnail'))
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('news', 'public');

            $news = News::create($data);

            return response()->json([
                'message' => 'Berita berhasil dibuat.',
                'data'    => $news,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data berita tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat berita: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $news = News::findOrFail($id);

            $data = $request->validate([
                'title'     => 'required|string|max:255',
                'content'   => 'required|string',
                'thumbnail' => 'nullable|image|max:2048',
            ]);

            $data['slug']   = Str::slug($data['title']);
            $allowed         = '<p><a><strong><em><ul><ol><li><br>';
            $data['content'] = strip_tags($data['content'], $allowed);
            $data['content'] = preg_replace('#(<[^>]+?)on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)#i', '$1', $data['content']);
            $data['active']  = true;

            if($request->hasFile('thumbnail')) {
                if($news->thumbnail)
                    Storage::disk('public')->delete($news->thumbnail);
                    
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('news', 'public');
            }

            $news->update($data);

            return response()->json([
                'message' => 'Berita berhasil diperbarui.',
                'data'    => $news,
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data berita tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui berita: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $news = News::findOrFail($id);

            if($news->thumbnail)
                Storage::disk('public')->delete($news->thumbnail);

            $news->delete();

            return response()->json([
                'message' => 'Berita berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data berita tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus berita: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
