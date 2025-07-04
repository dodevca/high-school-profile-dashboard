<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function edit()
    {
        return view('admin.achievement-edit');
    }
}
