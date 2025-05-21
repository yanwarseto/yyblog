<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Auth extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_v');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Silakan masukkan username kamu.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);



        $username = trim($credentials['username']);
        $password = $credentials['password'];
        $hashedPassword = hash('sha1', md5($password));


        $user = \DB::table('T_USERS')->where('USERNAME', $username)->first();

        if (!$user) {
            return back()->withErrors([
                'Username tidak terdaftar.',
            ])->onlyInput('username');
        }

        if ($user->PASSWORD !== $hashedPassword) {
            // Password salah
            return back()->withErrors([
                'Password salah.',
            ])->onlyInput('username');
        }

        // Saving Log Login
        DB::table('T_LOG')->insert([
            'ID' => Str::uuid()->toString(),
            'USERNAME' => $user->USERNAME,
            'IP' => $request->ip(),
            'LOG_TIME' => Carbon::now(),
            'ACTIVITY' => $user->USERNAME . ' Login '
        ]);

        Session::put('username', $user->USERNAME);
        return redirect('/dashboard');
    }
}
