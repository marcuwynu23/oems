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
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }


    //register
    public function register()
    {
        return view('auth.register.index');
    }

    public function postRegister(Request $request)
    {
        $credentials = $request->post();
        if($credentials['password'] !== $request->password_confirmation){
            return redirect()->back();
        }
        Log::info($credentials);

        $credentials['password'] = bcrypt($credentials['password']);
        $user = \App\Models\User::create($credentials);
        auth()->login($user);
        return redirect()->route('home');
    }

    // recovery 
    public function recovery()
    {
        return view('auth.recovery.index');
    }

    public function postRecovery(Request $request)
    {
        $credentials = $request->only('email');
        // get recovery code of user and send it to user email
        $user = \App\Models\User::where('email',$credentials['email'])->first();
        // if($user){
            // generate random 5 digit code 
            $recoveryCode = rand(10000,99999);
            Log::info($recoveryCode);
            // $user->recoveryCode = $recoveryCode;
            // $user->save();
            // send recovery code to user email
            // mailsend = mail($user->email,'Recovery Code',$recoveryCode);
            // if($mailsend){
            //     return redirect()->route('auth.recovery.confirm');
            // }
        // }
        
        return redirect()->back();
    }

    public function recoveryConfirm()
    {
        return view('auth.recovery.confirm.index');
    }

    public function postRecoveryConfirm(Request $request)
    {
        $credentials = $request->only('recoveryCode','password','password_confirmation');

        if($credentials['password'] !== $request->password_confirmation){
            return redirect()->back();
        }

        $user = \App\Models\User::where('recoveryCode',$credentials['recoveryCode'])->first();
        // reset recovery code and password
        if($user){
            $user->recoveryCode = null;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('auth.login');
        }
    }

}
