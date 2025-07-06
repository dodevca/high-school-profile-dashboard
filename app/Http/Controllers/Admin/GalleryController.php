<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function edit()
    {
        return view('admin.gallery-edit');
    }

    public function delete()
    {
        return view('admin.gallery-delete');
    }
}
