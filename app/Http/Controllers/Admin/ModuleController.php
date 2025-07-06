<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;

class ModuleController extends Controller
{
    public function index()
    {
        $majors = Major::all();

        return view('admin.module', compact('majors'));
    }
    
    public function add()
    {
        return view('admin.module-add');
    }

    public function edit()
    {
        return view('admin.module-edit');
    }
}
