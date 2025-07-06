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
        return view('admin.announcement-add');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcement-edit', compact('announcement'));
    }
}
