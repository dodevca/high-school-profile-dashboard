<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search                = $request->input('query');
        $priority              = $request->input('priority');
        $sort                  = $request->input('sort', 'created_at|desc');
        $page                  = (int) $request->input('page', 1);
        $perPage               = (int) $request->input('perPage', 12);
        [$sortField, $sortDir] = explode('|', $sort) + [1 => 'asc'];
        $query                 = Teacher::query();

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        
        if($priority !== null)
            $query->where('priority', $priority);

        $query->orderBy($sortField, $sortDir);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );

        $paginated->getCollection()->transform(function(Teacher $t) {
            return [
                'id'         => $t->id,
                'name'       => $t->name,
                'position'   => $t->position,
                'nip'        => $t->nip,
                'photo'      => $t->photo,
                'subject'    => $t->subject,
                'priority'   => $t->priority,
                'created_at' => optional($t->created_at)->format('d-m-Y'),
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
                'name'     => 'required|string|max:255',
                'position' => 'required', 'string', 'max:100',
                'nip'      => 'nullable|string|max:50',
                'subject'  => 'required|string|max:100',
                'photo'    => 'nullable|image|max:1024',
            ]);

            [$priority, $position] = explode('|', $data['position']);
            $data['position']      = $position;
            $data['priority']      = $priority;

            if($request->hasFile('photo'))
                $data['photo'] = $request->file('photo')
                    ->store('teachers', 'public');

            $teacher = Teacher::create($data);

            return response()->json([
                'message' => 'Guru/staff berhasil ditambahkan.',
                'data'    => $teacher,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data guru/staff tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menambahkan guru/staff: '.$e->getMessage());

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
            $teacher = Teacher::findOrFail($id);

            $data = $request->validate([
                'name'     => 'required|string|max:255',
                'position' => 'required', 'string', 'max:100',
                'nip'      => 'nullable|string|max:50',
                'subject'  => 'required|string|max:100',
                'photo'    => 'nullable|image|max:1024',
            ]);

            [$priority, $position] = explode('|', $data['position']);
            $data['position']      = $position;
            $data['priority']      = $priority;

            if($request->hasFile('photo')) {
                if($teacher->photo)
                    Storage::disk('public')->delete($teacher->photo);

                $data['photo'] = $request->file('photo')
                    ->store('teachers', 'public');
            }

            $teacher->update($data);

            return response()->json([
                'message' => 'Guru/staff berhasil diperbarui.',
                'data'    => $teacher->fresh(),
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data guru/staff tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui guru/staff: '.$e->getMessage());

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
            $teacher = Teacher::findOrFail($id);

            if($teacher->photo)
                Storage::disk('public')->delete($teacher->photo);

            $teacher->delete();

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
