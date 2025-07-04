<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher');
    }
    
    public function add()
    {
        return view('admin.teacher-add');
    }

    public function edit()
    {
        return view('admin.teacher-edit');
    }
}
