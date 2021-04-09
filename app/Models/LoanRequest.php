<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "person_id",
        "loan_id"
    ];

    public function person(){
        return $this->hasOne(Person::class, 'id', 'person_id')->first();
    }

    public function loan(){
        return $this->hasOne(Loan::class, 'id', 'loan_id')->first();
    }
}
