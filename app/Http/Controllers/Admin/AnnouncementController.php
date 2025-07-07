<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Major;

class AnnouncementController extends Controller
{
    public function index()
    {
        $majors = Major::all();

        return view('admin.announcement', compact('majors'));
    }

    public function add()
    {
        $majors = Major::all();
        
        return view('admin.announcement-add', compact('majors'));
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        $majors       = Major::all();

        return view('admin.announcement-edit', compact('announcement', 'majors'));
    }
}
