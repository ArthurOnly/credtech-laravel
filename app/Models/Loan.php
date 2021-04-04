<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        "value",
        "cicle",
        "parcels",
        "warranty_id",
        "segment_id"
    ];

}
