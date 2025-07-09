<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $search                = $request->input('search');
        $category              = $request->input('category');
        $level                 = $request->input('level');
        $sort                  = $request->input('sort', 'achieved_at|desc');
        [$sortField, $sortDir] = explode('|', $sort) + [1 => 'desc'];
        $query                 = Achievement::query();

        if($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('achieved_by', 'like', "%{$search}%");
            });
        }

        if($category)
            $query->where('category', $category);

        if($level)
            $query->where('level', $level);

        $query->orderBy($sortField, $sortDir);

        $achievements = $query->paginate(9)
            ->withQueryString()
            ->through(function ($ach) {
                $ach->achieved_at_formatted = $ach->achieved_at ? $ach->achieved_at->translatedFormat('d F Y') : null;

                return $ach;
            });

        $sortOptions = [
            'achieved_at|desc' => 'Terbaru',
            'achieved_at|asc'  => 'Terlama',
            'title|asc'        => 'A-Z',
            'title|desc'       => 'Z-A',
        ];

        return view('public.achievement', compact(
            'achievements',
            'search',
            'category',
            'level',
            'sort',
            'sortOptions'
        ));
    }
}
