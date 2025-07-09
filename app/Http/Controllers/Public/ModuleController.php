<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index(Request $request, $major_code)
    {
        $search                      = $request->input('search');
        $sort                        = $request->input('sort', 'created_at|desc');
        [$sortField, $sortDirection] = explode('|', $sort);

        $sortOptions = [
            'created_at|desc'  => 'Terbaru',
            'created_at|asc'   => 'Terlama',
            'grade_level|asc'  => "Kelas &uarr;",
            'grade_level|desc' => "Kelas &darr;",
            'title|asc'        => 'A-Z',
            'title|desc'       => 'Z-A',
        ];

        $query = Module::with('major')
            ->whereHas('major', function($q) use($major_code) {
                $q->where('code', $major_code);
            });

        if($search)
            $query->where(function($q) use($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });

        $query->orderBy($sortField, $sortDirection);

        $modules = $query->paginate(10)
            ->withQueryString()
            ->through(function($m) {
                return (object) [
                    'id'                   => $m->id,
                    'title'                => $m->title,
                    'major'                => $m->major->name,
                    'grade_level'          => $m->grade_level,
                    'semester'             => $m->semester,
                    'subject'              => $m->subject,
                    'file'                 => $m->file,
                    'created_at_formatted' => $m->created_at->translatedFormat('d F Y'),
                ];
            });

        return view('public.module', compact(
            'modules', 'search', 'sort', 'sortOptions', 'major_code'
        ));
    }
}
