<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort                        = $request->input('sort', 'created_at|desc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        $majorId                     = $request->get('major_id');
        $search                      = $request->input('search');
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'desc'];
        $query                       = Announcement::query()
            ->with('major');

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });

        if($majorId)
            $query->where('major_id', $majorId);

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );
        
        $paginated->getCollection()->transform(function($announcement) {
            return [
                'id'         => $announcement->id,
                'title'      => $announcement->title,
                'image'      => $announcement->image,
                'major_id'   => $announcement->major_id,
                'major'      => $announcement->major?->name,
                'major_code' => $announcement->major?->code,
                'created_at' => $announcement->created_at ? $announcement->created_at->format('d-m-Y') : null,
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
                'title'    => 'required|string|max:255',
                'content'  => 'required|string',
                'major_id' => 'nullable|exists:majors,id',
                'image'    => 'nullable|image|max:2048',
            ]);

            $data['active'] = true;

            if($request->hasFile('thumbnail'))
                $data['image'] = $request->file('image')
                    ->store('announcements', 'public');

            $announcement = Announcement::create($data);

            return response()->json([
                'message' => 'Pengumuman berhasil dibuat.',
                'data'    => $announcement,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data pengumumans tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat pengumuman: '.$e->getMessage());

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
            $announcement = Announcement::findOrFail($id);

            $data = $request->validate([
                'title'    => 'required|string|max:255',
                'content'  => 'required|string',
                'major_id' => 'nullable|exists:majors,id',
                'image'    => 'nullable|image|max:2048',
            ]);

            $data['active'] = true;

            if ($request->hasFile('image')) {
                if($announcement->image)
                    Storage::disk('public')->delete($announcement->image);
                    
                $data['image'] = $request->file('image')
                    ->store('announcements', 'public');
            }

            $announcement->update($data);

            return response()->json([
                'message' => 'Pengumuman berhasil diperbarui.',
                'data'    => $announcement,
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data pengumuman tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui pengumuman: '.$e->getMessage());

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
            $announcement = Announcement::findOrFail($id);

            if($announcement->image)
                Storage::disk('public')->delete($announcement->image);

            $announcement->delete();

            return response()->json([
                'message' => 'Pengumuman berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data pengumuman tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus pengumuman: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
