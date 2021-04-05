<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    private const TYPE_PHYSICAL = 0;
    private const TYPE_JURIDICAL = 1;

    protected $fillable = [
        "name",
        "celphone",
        "email",
        "type_id",
        "address",
        "CEP",
        "monthly_income",
        "doc_monthly_income",
        "doc_rg_verse",
        "doc_address_comp",
        "doc_selfie"
    ];

    public function additionalData(){
        if ($this['type_id'] == $this->TYPE_PHYSICAL){
            return $this->hasOne(PersonPhysical::class)->first();
        } else{
            return $this->hasOne(PersonJuridical::class)->first();
        }
    }

    public function debtors(){
        return $this->hasOne(Debtors::class);
    }
}
