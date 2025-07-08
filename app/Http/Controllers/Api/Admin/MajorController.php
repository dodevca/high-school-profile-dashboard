<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Validation\ValidationException;
use Exception;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page                  = (int) $request->input('page', 1);
        $perPage               = (int) $request->input('perPage', 10);
        $search                = $request->input('search');
        $sort                  = $request->input('sort', 'created_at|desc');
        [$sortField, $sortDir] = array_pad(explode('|', $sort), 2, 'desc');

        $query = Major::query();

        if($search)
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });

        $query->orderBy($sortField, $sortDir);

        $paginated = $query->paginate($perPage, ['*'], 'page', $page);

        $paginated->getCollection()->transform(function (Major $major) {
            return [
                'id'          => $major->id,
                'code'        => $major->code,
                'name'        => $major->name,
                'description' => $major->description,
                'created_at'  => $major->created_at?->format('d-m-Y'),
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
                'code'        => 'required|string|max:50|unique:majors,code',
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $major = Major::create($data);

            return response()->json([
                'message' => 'Jurusan berhasil ditambahkan.',
                'data'    => $major,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data jurusan tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat jurusan: '.$e->getMessage());

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
            $major = Major::findOrFail($id);

            $data = $request->validate([
                'code'        => "required|string|max:50|unique:majors,code,{$major->id}",
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $major->update($data);

            return response()->json([
                'message' => 'Jurusan berhasil diperbarui.',
                'data'    => $major,
            ]);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data jurusan tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui jurusan: '.$e->getMessage());

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
            $major = Major::findOrFail($id);

            $major->delete();

            return response()->json([
                'message' => 'Jurusan berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data jurusan tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus jurusan: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
