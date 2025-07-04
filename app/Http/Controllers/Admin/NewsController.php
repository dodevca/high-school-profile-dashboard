<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news');
    }
    
    public function add()
    {
        return view('admin.news-add');
    }

    public function edit()
    {
        return view('admin.news-edit');
    }
}
