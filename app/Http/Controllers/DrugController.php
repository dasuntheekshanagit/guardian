<?php

namespace App\Http\Controllers;
use App\Models\Drugs;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric'
        ]);

        $drug = new Drugs([
            'name' => $validated['name'],
            'price' => $validated['price']
        ]);

        $drug->save();

        return redirect('/drugs');
    }

    public function index(){
        $drugs = Drugs::all();

        return view('drug', ['drugs' => $drugs]);
    }

    public function destroy($id){
        $drug = Drugs::findOrFail($id);
        $drug->delete();

        return redirect('/drugs');
    }
}
