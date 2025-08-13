<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View; // If you're returning a view

class HomeController  extends Controller
{
    public function index()
    {
        $data['listJourney'] = DB::table('JOURNEY')
            ->orderBy('DATE', 'desc')
            ->limit(3)
            ->get();
        return view('home_v', $data);
    }
}
