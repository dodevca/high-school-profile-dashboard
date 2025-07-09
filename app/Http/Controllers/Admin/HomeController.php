<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Module;

class HomeController extends Controller
{
    public function index()
    {
        $totals = [
            'news'         => News::count(),
            'announcement' => Announcement::count(),
            'event'        => Event::count(),
            'module'       => Module::count(),
        ];

        return view('admin.home', compact('totals'));
    }
}