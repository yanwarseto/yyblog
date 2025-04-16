<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // If you're returning a view

class HomeController  extends Controller
{
    public function index()
    {
        return view('home_v');
    }
}
