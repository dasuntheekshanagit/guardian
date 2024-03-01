<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function index(){
        return view('signin');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = request()->has('remember');

        if (auth()->attempt($validated, $remember)) {
            request()->session()->regenerate();
            
            if (auth()->user()->address === null) {
                return redirect()->route('signup.userdetails');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('signin.index')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('signin.index');
    }
}
