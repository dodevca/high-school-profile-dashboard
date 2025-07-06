<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('admin.module');
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
