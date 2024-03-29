<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'title',
        'address',
        'note',
        'user',
        'status'
    ];

    public function drugs(){
        return $this->belongsToMany(Drugs::class, 'prescription_drugs', 'prescription_id', 'drug_id');
    }
}
