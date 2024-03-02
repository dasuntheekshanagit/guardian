<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Drugs;
use App\Models\Quatations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PrescriptionController extends Controller
{
    public function index(){
        return view('preceptcard');
    }

    public function show($id){
        $prescription = Prescription::find($id);
        $drugs = Drugs::all();
        return view('prescriptionquta', ['prescription' => $prescription, 'drugs' => $drugs]);
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

    public function quatation($id){
        
        $data = request()->all();

        foreach ($data['drugs'] as $drugData) {
            $quatation = new Quatations([
                'prescription_id' => $id,
                'drug_id' =>(int) $drugData['id'],
                'amount' => (int) $drugData['amount']
            ]);
            $quatation->save();
        }
        $prescription = Prescription::findOrFail($id);
        $prescription->status = 'accept';
        $prescription->save();
        
        return response()->json($data, 200); 
    }

    public function getQuotationDetails($id){
        $prescription = Prescription::with('drugs')->findOrFail($id);

        return view('quatation', ['prescription' => $prescription]);
    }

    public function acceptQuotation($id){
        $prescription = Prescription::findOrFail($id);
        $prescription->status = 'agree';
        $prescription->save();

        return redirect('/')->with('message', 'Quotation accepted successfully!');
    }
}
