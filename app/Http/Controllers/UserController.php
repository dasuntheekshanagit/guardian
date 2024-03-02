<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                $prescriptions = Prescription::all();
                return view('dashboard2', ['prescriptions' => $prescriptions]);
            } else {
                $userEmail = auth()->user()->email;
                $prescriptions = Prescription::where('user', $userEmail)->get();
                return view('dashboard', ['prescriptions' => $prescriptions]);
            }
        } else {
            return route('signin.index');
        }
    }
}
