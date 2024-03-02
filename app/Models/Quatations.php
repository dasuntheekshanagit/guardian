<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quatations extends Model
{
    use HasFactory;

    protected $table = 'prescription_drugs';

    protected $fillable = [
        'prescription_id',
        'drug_id',
        'amount',
    ];
}
