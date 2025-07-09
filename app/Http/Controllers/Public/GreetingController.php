<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Greeting;

class GreetingController extends Controller
{
    public function index()
    {
        $greeting = Greeting::first();

        return view('public.greeting', compact('greeting'));
    }
}
