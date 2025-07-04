<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event');
    }

    public function add()
    {
        return view('admin.event-add');
    }

    public function edit()
    {
        return view('admin.event-edit');
    }
}
