<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    public function index()
    {
        return view('admin.major');
    }
    
    public function add()
    {
        return view('admin.major-add');
    }

    public function edit($id)
    {
        $major = Major::findOrFail($id);

        return view('admin.major-edit', compact('major'));
    }
}
