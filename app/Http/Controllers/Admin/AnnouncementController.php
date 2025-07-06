<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.announcement');
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
