<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login.index');
    }


    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        Log::info($credentials);

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
