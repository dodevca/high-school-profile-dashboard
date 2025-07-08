<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

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

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teacher-edit', compact('teacher'));
    }
}
