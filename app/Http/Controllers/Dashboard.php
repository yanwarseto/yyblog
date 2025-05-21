<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data['username'] = session('username');
        return view('admin.dashboard_v', $data);
    }
}
