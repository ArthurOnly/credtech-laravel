<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    private const TYPE_PHYSICAL = 0;
    private const TYPE_JURIDICAL = 1;

    protected $dateFormat = 'Y-m-d';
    protected $hidden = ['updated_at'];

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
            return $this->hasOne(PersonPhysical::class);
        } else{
            return $this->hasOne(PersonJuridical::class);
        }
    }

    public function debtors(){
        return $this->hasMany(Debtors::class);
    }
}
