<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Greeting;

class GreetingController extends Controller
{
    public function index()
    {
        $greeting = Greeting::firstOrFail();

        return view('admin.greeting', compact('greeting'));
    }
}
