<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_v');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $username = trim($credentials['username']);
        $password = $credentials['password'];

    }
}
