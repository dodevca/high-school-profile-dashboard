<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
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
        $majors = Major::all();

        return view('admin.module-add', compact('majors'));
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $majors = Major::all();

        return view('admin.module-edit', compact('module', 'majors'));
    }
}
