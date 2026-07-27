<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function actionLogin(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:6'],
            ]);

            // auth::Attemp: ngecek email dan password benar atau tidak
            if(Auth::attempt($credential)){
                $request->session()->regenerate();
                $user = Auth::user();
                session(['user_id' => $user->id, 'user_name' => $user->name]);
                return redirect()->intended('/admin/dashboard');
            }

            return back()->withErrors([
                'email' => 'Email; atau password salah!'
            ])->onlyInput('email');
    }
}
