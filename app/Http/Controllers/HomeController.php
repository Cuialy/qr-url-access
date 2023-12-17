<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function aboutUs()
    {
        return view('about-us');
    }

    public function aboutProject()
    {
        return view('about-project');
    }
}
