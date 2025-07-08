<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search                      = $request->input('search');
        $sort                        = $request->input('sort', 'start_time|asc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'asc'];
        $query                       = Gallery::query()
            ->withCount('gallery_image');

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );

        $paginated->getCollection()->transform(function (Gallery $gallery) {
            return [
                'id'          => $gallery->id,
                'title'       => $gallery->title,
                'description' => $gallery->description,
                'thumbnail'   => $gallery->thumbnail,
                'totalImages' => $gallery->gallery_image_count,
                'created_at'  => $gallery->created_at ? $gallery->created_at->format('d-m-Y') : null,
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
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'thumbnail'   => 'nullable|image|max:2048',
                'images.*'    => 'nullable|image|max:2048',
            ]);

            if($request->hasFile('thumbnail'))
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('thumbnails', 'public');

            $gallery = Gallery::create([
                'title'        => $data['title'],
                'description'  => $data['description'] ?? null,
                'thumbnail'    => $data['thumbnail'] ?? null,
            ]);

            if($request->hasFile('images')) {
                foreach($request->file('images') as $index => $file) {
                    $imgPath = $file->store('album', 'public');

                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image'      => $imgPath,
                    ]);
                }
            }

            return response()->json([
                'message' => 'Album berhasil dibuat.',
                'data'    => $gallery->load('gallery_image'),
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data galeri tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat album: '.$e->getMessage());

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
            $gallery = Gallery::findOrFail($id);

            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'thumbnail'   => 'nullable|image|max:2048',
                'images.*'    => 'nullable|image|max:2048',
            ]);

            if($request->hasFile('thumbnail')) {
                if($gallery->thumbnail)
                    Storage::disk('public')->delete($gallery->thumbnail);
                
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('thumbnails', 'public');
            }

            $gallery->title       = $data['title'];
            $gallery->description = $data['description'] ?? null;

            $gallery->save();

            if($request->hasFile('images')) {
                foreach($request->file('images') as $index => $file) {
                    $imgPath = $file->store('album', 'public');

                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image'      => $imgPath,
                    ]);
                }
            }

            return response()->json([
                'message' => 'Album berhasil diperbarui.',
                'data'    => $gallery->load('gallery_image'),
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data galeri tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui album: '.$e->getMessage());

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
            $album = Gallery::with('gallery_image')->findOrFail($id);

            DB::transaction(function() use ($album) {
                foreach($album->gallery_image as $img) {
                    Storage::disk('public')->delete($img->image);
                }
                
                $album->gallery_image()->delete();
                $album->delete();
            });

            return response()->json([
                'message' => 'Album berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data album tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus album: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }

    /**
     * DELETE /api/admin/gallery/{gallery}/{image}
     */
    public function destroyImage($galleryId, $imageId)
    {
        try {
            $gallery = Gallery::findOrFail($galleryId);
            $img     = $gallery->gallery_image()->where('id', $imageId)->firstOrFail();

            if($img->image && Storage::disk('public')->exists($img->image))
                Storage::disk('public')->delete($img->image);

            $img->delete();

            return response()->json([
                'message' => 'Gambar berhasil dihapus.'
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data gambar tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus gambar: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
