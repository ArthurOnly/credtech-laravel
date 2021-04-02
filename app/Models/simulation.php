<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'cicle',
        'parcels',
        'segment',
        'warranty',
        'name',
        'cpf/cnpj',
        'email',
        'celphone'
    ];
}
