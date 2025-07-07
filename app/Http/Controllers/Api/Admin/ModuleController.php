<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search                      = $request->input('search');
        $sort                        = $request->input('sort', 'created_at|desc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        $majorId                     = $request->get('major_id');
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'asc'];
        $query                       = Module::query()
            ->with('major');

        if($search)
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%");

        if($majorId)
            $query->where('major_id', $majorId);

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );

        $paginated->getCollection()->transform(function(Module $module) {
            return [
                'id'          => $module->id,
                'title'       => $module->title,
                'description' => $module->description ? Str::limit($module->description, 100) : null,
                'file_url'    => $module->file,
                'cover_url'   => $module->cover,
                'grade_level' => $module->grade_level,
                'major_id'    => $module->major_id,
                'major'       => $module->major?->name,
                'major_code'  => $module->major?->code,
                'subject'     => $module->subject,
                'semester'    => $module->semester,
                'created_at'  => $module->created_at ? $module->created_at->format('d-m-Y') : null,
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
                'title'        => 'required|string|max:255',
                'description'  => 'nullable|string',
                'file'         => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
                'grade_level'  => 'required|string|max:10',
                'major_id'     => 'required|exists:majors,id',
                'subject'      => 'nullable|string|max:255',
                'semester'     => 'required|string|max:10',
            ]);

            if($request->hasFile('file'))
                $data['file'] = $request->file('file')
                    ->store('module', 'public');

            $module = Module::create($data);

            return response()->json([
                'message' => 'Modul berhasil dibuat.',
                'data'    => $module,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data modul tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat modul: '.$e->getMessage());

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
            $module = Module::findOrFail($id);

            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'file'        => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
                'grade_level' => 'required|string|max:10',
                'major_id'    => 'required|exists:majors,id',
                'subject'     => 'nullable|string|max:255',
                'semester'    => 'required|string|max:10',
            ]);

            if($request->hasFile('file')) {
                if($module->file)
                    Storage::disk('public')->delete($module->file);

                $data['file'] = $request->file('file')
                    ->store('module', 'public');
            }

            $module->update($data);

            return response()->json([
                'message' => 'Modul berhasil diperbarui.',
                'data'    => $module->fresh(),
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data modul tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui modul: '.$e->getMessage());

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
            $module = Module::findOrFail($id);

            if($module->file)
                Storage::disk('public')->delete($module->file);

            $module->delete();

            return response()->json([
                'message' => 'Modul berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data modul tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus modul: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
