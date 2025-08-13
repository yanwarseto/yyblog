<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Dashboard extends Controller
{
    public function index()
    {
        $data['username'] = session('username');
        return view('admin.dashboard_v', $data);
    }

    public function logout(Request $request)
    {
        $username = session('username');
        DB::table('BLOG.T_LOG')->insert([
            'ID' => Str::uuid()->toString(),
            'USERNAME' => $username,
            'IP' => $request->ip(),
            'LOG_TIME' => Carbon::now(),
            'ACTIVITY' => $username . ' Logout '
        ]);
        $request->session()->flush(); // menghapus semua data session


        return redirect('/auths')->with('success', 'Berhasil logout.');
    }
}
