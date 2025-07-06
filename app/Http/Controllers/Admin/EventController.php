<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

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

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.event-edit', compact('event'));
    }
}
