<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(){
        return view('preceptcard');
    }

    public function store(){
        $validated = request()->validate([
            'title' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'contactno' => 'required|min:3|max:255',
            'note' => 'nullable|min:3|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $prescription = new Prescription([
            'title' => $validated['title'],
            'address' => $validated['address'],
            'note' => $validated['note'],
            'user' => auth()->user()->email
        ]);

        if (isset($validated['contactno'])) {
            $prescription->contactno = $validated['contactno'];
        }

        if(request()->hasFile('images')) {
            $images = request()->file('images');
            foreach($images as $key => $image) {
                $path = $image->store('prescriptions', 'public');
                if ($path) {
                    $imageKey = 'image' . ($key + 1);
                    $prescription->$imageKey = $path;
                }
            }
        }

        $prescription->save();
        
        $data = request()->all();
        return response()->json($data, 200); 
    }
}
