<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery');
    }

    public function add()
    {
        return view('admin.gallery-add');
    }

    public function edit($id)
    {
        $album = Gallery::with('gallery_image')->findOrFail($id);

        return view('admin.gallery-edit', compact('album'));
    }
}
