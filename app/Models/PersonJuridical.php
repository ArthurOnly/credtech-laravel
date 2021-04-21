<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonJuridical extends Model
{
    use HasFactory;

    protected $table = 'persons_juridical';

    protected $fillable = [
        "person_id",
        "cnpj",
        "cpf_partner",
        "doc_address_comp_partner"
    ];

    protected $hidden = [
        "person_id",
        'updated_at', 
        'created_at'
    ];
}
