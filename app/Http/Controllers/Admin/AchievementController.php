<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        return view('admin.achievement');
    }

    public function add()
    {
        return view('admin.achievement-add');
    }

    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);

        return view('admin.achievement-edit', compact('achievement'));
    }
}
