<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search                      = $request->input('search');
        $sort                        = $request->input('sort', 'achieved_at|desc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        $category                    = $request->input('category');
        $level                       = $request->input('level');
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'asc'];

        $query = Achievement::query();

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('achieved_by', 'like', "%{$search}%");
            });

        if($category)
            $query->where('category', $category);

        if($level)
            $query->where('level', $level);

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate($perPage, ['*'], 'page', $page);

        $paginated->getCollection()->transform(function (Achievement $ach) {
            return [
                'id'          => $ach->id,
                'title'       => $ach->title,
                'category'    => $ach->category,
                'level'       => $ach->level,
                'rank'        => $ach->rank,
                'achieved_by' => $ach->achieved_by,
                'achieved_at' => $ach->achieved_at ? $ach->achieved_at->format('d-m-Y') : null,
                'description' => $ach->description ? Str::limit($ach->description, 100) : null,
                'photo_url'   => $ach->photo ? Storage::url($ach->photo) : null,
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
                'category'    => 'required|string|in:Murid,Guru,Sekolah,Ekstrakulikuler',
                'level'       => 'required|string|max:100',
                'rank'        => 'required|string|max:100',
                'achieved_by' => 'required|string|max:255',
                'achieved_at' => 'required|date',
                'description' => 'nullable|string',
                'photo'       => 'nullable|image|max:5120',
            ]);

            if($request->hasFile('photo'))
                $data['photo'] = $request->file('photo')
                    ->store('achievements', 'public');

            $ach = Achievement::create($data);

            return response()->json([
                'message' => 'Prestasi berhasil dibuat.',
                'data'    => $ach,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data prestasi tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat prestasi: '.$e->getMessage());

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
            $ach = Achievement::findOrFail($id);

            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'category'    => 'required|string|in:Murid,Guru,Sekolah,Ekstrakulikuler',
                'level'       => 'required|string|max:100',
                'rank'        => 'required|string|max:100',
                'achieved_by' => 'required|string|max:255',
                'achieved_at' => 'required|date',
                'description' => 'nullable|string',
                'photo'       => 'nullable|image|max:5120',
            ]);

            if($request->hasFile('photo')) {
                if($ach->photo)
                    Storage::disk('public')->delete($ach->photo);

                $data['photo'] = $request->file('photo')
                    ->store('achievements', 'public');
            }

            $ach->update($data);

            return response()->json([
                'message' => 'Prestasi berhasil diperbarui.',
                'data'    => $ach->fresh(),
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data prestasi tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui prestasi: '.$e->getMessage());

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
            $ach = Achievement::findOrFail($id);

            if($ach->file)
                Storage::disk('public')->delete($ach->file);

            $ach->delete();

            return response()->json([
                'message' => 'Prestasi berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data prestasi tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus prestasi: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
