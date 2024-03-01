<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserdetailsController extends Controller
{
    public function index(){
        return view('details');
    }

    public function store(){
        $validated = request()->validate([
            'address' => 'required',
            'contactno' => 'required',
            'dob' => 'required|date_format:m/d/Y',
        ]);
    
        $dob = \DateTime::createFromFormat('m/d/Y', $validated['dob'])->format('Y-m-d');
    
        $user = auth()->user();
        $user->address = $validated['address'];
        $user->contactno = $validated['contactno'];
        $user->dob = $dob;
    
        $user->save();

       return redirect()->route('dashboard');
    }
}