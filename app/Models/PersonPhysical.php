<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonPhysical extends Model
{
    use HasFactory;

    protected $table = 'persons_physical';

    protected $fillable = [
        "person_id",
        "cpf"
    ];
}
