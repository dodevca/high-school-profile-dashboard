<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;

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

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news-edit', compact('news'));
    }
}
