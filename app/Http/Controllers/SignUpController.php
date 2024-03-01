<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function register(){
        // dump($_POST);
        // dump(request()->get('email',''));
        $validated = request()->validate([
            'firstName' => 'required|min:3|max:40',
            'lastName' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:20'
        ]);

        $user = new User([
            'firstname' => $validated['firstName'],
            'lastname' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'address' => null,
            'contactno' => null,
            'dob' => null,
        ]);

        $user->save();

        return redirect()->route('signup.userdetails');
    }

}
