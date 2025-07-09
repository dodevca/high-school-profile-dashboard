<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function index()
    {
        $information = Information::first();

        return view('public.information', compact('information'));
    }
}
