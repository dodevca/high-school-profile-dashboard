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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
